<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    public function index()
    {
        return view('admin.contracts.index');
    }

    public function create()
    {
        return view('admin.contracts.create');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.contracts.edit', compact('id'));
    }
}
