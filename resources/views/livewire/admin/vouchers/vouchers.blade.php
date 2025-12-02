<div class="main-side">
    @section('title', 'قيود اليومية')

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                قيود اليومية
            </li>
        </ol>
    </nav>
    <x-message-admin />
    <div class="bar-options d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
        @can('create_vouchers')
            <a href="{{ route('admin.vouchers.create') }}" class="btn btn-success">@lang('Add') <i
                    class="fas fa-plus"></i></a>
        @endcan
    </div>

    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">قيود اليومية</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">بحث بالوصف أو رقم القيد</label>
                        <input type="text" wire:model.live="search" class="form-control"
                            placeholder="@lang('Search')">
                    </div>
                </div>

                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">من</label>
                        <input type="date" wire:model.live="from" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-3">
                        <label class="form-label">إلى</label>
                        <input type="date" wire:model.live="to" class="form-control">
                    </div>
                </div>
            </div>

            @if ($vouchers->count() > 0)
                <div class="table-responsive">
                    <table class="table main-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الوصف</th>
                                <th>التاريخ</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->id }}</td>
                                    <td>{{ $voucher->description }}</td>
                                    <td>{{ $voucher->date }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.vouchers.show', $voucher->id) }}"> <i
                                                class="fa fa-eye"></i></a>

                                        @can('update_vouchers')
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.vouchers.edit', $voucher->id) }}"> <i
                                                    class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('delete_vouchers')
                                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#delete" wire:click="itemId({{ $voucher->id }})">
                                                <i class="fa fa-trash"></i></button>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @can('delete_vouchers')
                        @include('livewire.admin.vouchers.delete')
                    @endcan
                </div>
                <div class="mt-2">
                    {{ $vouchers->links() }}
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    عفواً، لا يوجد بيانات
                </div>
            @endif
        </div>
    </div>
</div>
