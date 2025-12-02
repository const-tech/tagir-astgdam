<?php

namespace App\Livewire\Admin\Vouchers;

use App\Models\Voucher;
use Livewire\Component;
use misterspelik\LaravelPdf\Facades\Pdf;

class ShowVouchers extends Component
{
    public $voucher;

    public function mount(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }

    public function render()
    {
        return view('livewire.admin.vouchers.show-vouchers')->extends('admin.layouts.admin')->section('content');
    }

    public function print()
    {
        $data = [
            'voucher' => $this->voucher,
        ];

        $pdf = Pdf::loadView('pdf.voucher', $data);

        $pdf_name = 'voucher_' . $this->voucher->id . '.pdf';
        $pdf->save(public_path('pdf/' . $pdf_name));

        return  response()->download(public_path('pdf/' . $pdf_name))->deleteFileAfterSend(true);
    }
}
