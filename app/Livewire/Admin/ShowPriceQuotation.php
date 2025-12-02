<?php

namespace App\Livewire\Admin;

use App\Mail\SendContractMail;
use App\Mail\SendPriceQuotationMail;
use Livewire\Component;
use App\Models\PriceQuotation;
use Illuminate\Support\Facades\Mail;
use PDF;

class ShowPriceQuotation extends Component
{
    public $price_quotation, $file_path, $request_lang, $request_contract, $request_screen;
    public $queryString = ['request_contract', 'request_lang', 'request_screen'];
    public function mount(PriceQuotation $price_quotation)
    {
        $this->price_quotation = $price_quotation;
        $this->request_screen = request('screen');
        $this->request_lang = request('lang');
        $this->request_contract = request('contract') ?? '';
    }
    public function render()
    {
        return view('livewire.admin.show-price-quotation')
            ->extends('admin.layouts.admin')
            ->section('content');
    }

    public function downloadPdf()
    {
        $data = [
            'price_quotation' => $this->price_quotation,
        ];
        if ($this->request_screen == 'en') {
            $view = 'pdf.show_price_quotation_en';
        } elseif ($this->request_screen == 'contract') {
            $view = 'pdf.price_quotation_contract_two';
        } elseif ($this->request_screen == 'contract_ar') {
            $view = 'pdf.price_quotation_contract';
        } else {
            $view = 'pdf.show_price_quotation';
        }

        $pdf = PDF::loadView($view, $data);

        if ($this->request_screen == 'contract' || $this->request_screen == 'contract_ar') {
            $pdf_name = 'عقد' . date('Ymdhis') . '.pdf';
        } else {
            $pdf_name = 'عرض_سعر_' . date('Ymdhis') . '.pdf';
        }
        if (!file_exists(public_path('pdf'))) {
            if (!mkdir($concurrentDirectory = public_path('pdf'), 0755, true) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
        }
        $pdf->save(public_path('pdf/' . $pdf_name));
        $this->file_path = public_path('pdf/' . $pdf_name);
        return response()->download(public_path('pdf/' . $pdf_name));
    }

    public function sendMail()
    {
        $this->downloadPdf();
        $email = $this->price_quotation?->client?->email;
        if (!$email) {
            return to_route('admin.prices')->with('error', ' لا يوجد بريد الكترونى للعميل');
        }
        $files = [
            public_path('files/CR EOM.pdf'),
            public_path('files/emaar el mosanad bank details.pdf'),
            public_path('files/National address.pdf'),
            public_path('files/VAT EOM.pdf'),
            public_path('files/Zakat certificate.pdf'),
        ];
        if ($this->request_screen == 'contract' || $this->request_screen == 'contract_ar') {
            Mail::to($email)->send(new SendContractMail($this->price_quotation, $this->file_path, $files));
        } else {
            Mail::to($email)->send(new SendPriceQuotationMail($this->price_quotation, $this->file_path, $files));
        }

        unlink($this->file_path);
        return to_route('admin.prices')->with('success', 'تم الارسال بنجاح');
    }
}
