<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceQuotation;
use Illuminate\Http\Request;

class ShowPriceQutation extends Controller
{
    public $price_quotation;
    public function index($id)
    {
        $price_quotation = PriceQuotation::find($id);
        return view('admin.prices.show_prices', compact('price_quotation'));
    }
}