<?php

namespace App\Livewire;

use App\Http\Requests\PriceQuotationRequest;
use App\Models\PriceQuotation;
use Livewire\Component;

class PriceQuotations extends Component
{
    public $client_id;
    public $search;
    public $price_quotation;
    public string $screen = 'index';

    public function render()
    {
        $priceQuotations = PriceQuotation::latest()
            ->paginate(10);
        //  $priceQuotations = PriceQuotation::whereAny(['client_name','client_phone'],'like',"%$this->search%")
        //      ->paginate(10);
        return view('livewire.price-quotations', compact('priceQuotations'));
    }

    public function edit(PriceQuotation $priceQuotation)
    {
        $this->client_id = $priceQuotation->client_id;
        $this->price_quotation = $priceQuotation;
        $this->screen = 'edit';
    }

    public function submit()
    {
        $data = $this->validate([
            'client_id' => 'required|exists:users,id',
        ]);
        if ($this->price_quotation) {
            $this->price_quotation->update($data);
            $price = $this->price_quotation;
        } else {
            $price = PriceQuotation::create($data);
        }
        return to_route('admin.prices.chat', $price->id);
    }

    public function delete(PriceQuotation $priceQuotation)
    {
        $priceQuotation->delete();
        $this->dispatch('alert', type: 'success', message: 'تم الحذف بنجاح');
    }
}
