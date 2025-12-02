<?php

namespace App\Livewire\Admin\Vouchers;

use App\Models\Voucher;
use Livewire\Component;
use Livewire\WithPagination;

class Vouchers extends Component
{
    use WithPagination;

    public $from, $to, $search, $voucher, $rejected_reason, $type;

    protected $paginationTheme = 'bootstrap';

    public function updating()
    {
        $this->resetPage();
    }

    public function between($query)
    {
        if ($this->from && $this->to) {
            $query->whereBetween('date', [$this->from, $this->to]);
        } elseif ($this->from) {
            $query->where('date', '>=', $this->from);
        } elseif ($this->to) {
            $query->where('date', '<=', $this->to);
        } else {
            $query;
        }
    }

    public function render()
    {
        $vouchers = Voucher::when($this->search, function ($q) {
            $q->where('description', 'LIKE', "%$this->search%")
                ->orWhere('id', 'LIKE', "%$this->search%");
        })->when($this->type, function ($q) {
            $q->where('type', $this->type);
        })->where(function ($q) {
            $this->between($q);
        })->latest('id')->paginate(10);

        return view('livewire.admin.vouchers.vouchers', compact('vouchers'))->extends('admin.layouts.admin')->section('content');
    }

    public function itemId(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }

    public function delete()
    {
        $this->voucher->delete();
        $this->reset();
        session()->flash('success', 'تم حذف البيانات بنجاح');
    }
}
