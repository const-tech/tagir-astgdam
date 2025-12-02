<div class="main-side">
    @section('title', 'مراكز التكلفة')

    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                مراكز التكلفة
            </li>
        </ol>
    </nav>

    <div class="row g-4">
        @if (auth()->user()->can('create_accounts') && auth()->user()->can('update_accounts'))
            <div class="col-md-4">
                <div class="issue-main-info">
                    <div class="content-header">
                        اضف مركز تكلفة جديد
                    </div>
                    <x-message-admin />

                    <div class="col-md-12">
                        <label class="small-label" for="">
                            اسم مركز التكلفة
                            <span class="text-danger">*</span>
                        </label>
                        <div class="box-input">
                            <input type="text" class="form-control" wire:model='name' />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="small-label" for="">
                            فرعي من
                        </label>
                        <div class="box-input">
                            <select wire:model="parent_id" class="form-control">
                                <option value="">اختر</option>
                                @foreach ($all_centers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" wire:click='submit' class="btn btn-sm btn-success"> @lang('Save')
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="issue-main-info">
                <div class="content-header">
                    عرض كل مراكز التكلفة
                </div>
                <div class="bar-obtions d-flex align-items-center justify-content-end flex-wrap gap-3 mb-4">
                    <div class="box-search">
                        <input type="text" class="form-control" wire:model="search" placeholder="بحث" />
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table main-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>إسم مركز التكلفة</th>
                                <th>فرعي من </th>
                                <th>إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cost_centers as $center)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $center->name }}</td>
                                    <td>{{ $center->main?->name }}</td>
                                    <td>
                                        <div class="btn-holder d-flex align-items-center gap-3">
                                            @can('update_accounts')
                                                <button type="button" wire:click='edit({{ $center->id }})'>
                                                    <i class="fas fa-pen text-info icon-table"></i>
                                                </button>
                                            @endcan
                                            @can('delete_accounts')
                                                <x-delete-modal :item="$center" />
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan='4'>
                                        <div class="alert alert-warning">
                                            @lang('No results')
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $cost_centers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
