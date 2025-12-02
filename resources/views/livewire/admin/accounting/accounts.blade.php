<div class="main-side">
    @section('title', 'شجرة الحسابات')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                شجرة الحسابات
            </li>
        </ol>
    </nav>

    <div class="section_content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">الحسابات</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-sm btn-success mb-2" data-bs-target="#import" data-bs-toggle="modal">استيراد
                        من اكسيل</button>
                    <a class="btn btn-sm btn-info mb-2" href="{{ route('admin.account_settings') }}">إعدادات الشجرة</a>
                    <div class="modal fade" id="import" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">استيراد </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">الملف</label>
                                        <input type="file" class="form-control" wire:model='file'>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm px-3"
                                        data-bs-dismiss="modal">الغاء</button>
                                    <button data-bs-dismiss="modal" class="btn btn-primary btn-sm px-3"
                                        wire:click='import'>حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" wire:model='search' placeholder="بحث.....">
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <div class="option-section">
                                    @if ($search && $account_item)
                                        <div class="d-flex mb-2">
                                            <button class="item bg-primary mx-2"> <i
                                                    class="fa fa-caret-down  arrow-after"></i>
                                                <i class="arrow-before fa fa-caret-left "></i>
                                                <div class="content-item">
                                                    <i class="fa fa-list "></i>
                                                    {{ $account_item->account_no }} - {{ $account_item->name }}
                                                </div>
                                            </button>

                                            <div class="dropdown">
                                                <a href="#" class="btn-action dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></a>
                                                <div class="dropdown-menu dropdown-menu-end" style="padding:10px">
                                                    <button wire:click="chooseAccount({{ $account_item->id }})"
                                                        class="d-block btn btn-sm btn-success w-100 mb-1"
                                                        type="button"><i class="fa fa-plus "></i> أضف</button>

                                                    <button wire:click="edit({{ $account_item->id }})"
                                                        class="d-block  btn btn-sm btn-info w-100 mb-1"
                                                        type="button"><i class="fa fa-edit "></i> تعديل</button>

                                                    <button class="d-block  btn btn-danger btn-sm w-100 mb-1"
                                                        type="button" data-bs-toggle="modal" data-bs-target="#delete"
                                                        wire:click="itemId({{ $account_item->id }})">
                                                        <i class="fa fa-trash "></i> حذف</button>

                                                    <a class="text-white d-block w-100 mb-1 btn btn-dark btn-sm"
                                                        href="{{ route('admin.accounts.show', $account_item->id) }}"><i
                                                            class="fa fa-eye "></i> كشف
                                                        حساب</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @php
                                            function renderNestedAccounts($assets, $level)
                                            {
                                                foreach ($assets as $asset) {
                                                    echo '<div class="d-flex mb-2">';
                                                    echo '<a class="item mx-2 bg-primary" data-bs-toggle="collapse" href="#link-' .
                                                        $asset->id .
                                                        '-' .
                                                        $level .
                                                        '">';
                                                    echo '<i class="fa fa-caret-down  arrow-after"></i>';
                                                    echo '<i class="arrow-before fa fa-caret-left "></i>';
                                                    echo '<div class="content-item">';
                                                    echo '<i class="fa fa-list "></i>';
                                                    echo $asset->account_no . ' - ' . $asset->name;
                                                    echo '</div>';
                                                    echo '</a>';
                                                    echo '<div class="dropdown">
                                            <a href="#" class="btn-action  dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="padding:10px">';
                                                    echo '<button wire:click="chooseAccount(' .
                                                        $asset->id .
                                                        ')" class="d-block btn btn-sm btn-success w-100 mb-1" type="button"><i class="fa fa-plus "></i> أضف</button>';
                                                    echo '<button wire:click="edit(' .
                                                        $asset->id .
                                                        ')" class="d-block  btn btn-sm btn-info w-100 mb-1" type="button"><i class="fa fa-edit "></i> تعديل</button>';
                                                    echo '<button class="d-block btn btn-danger btn-sm w-100 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#delete" wire:click="itemId(' .
                                                        $asset->id .
                                                        ')"><i class="fa fa-trash "></i> حذف</button>';
                                                    echo '<a class="text-white d-block w-100 mb-1 btn btn-dark btn-sm" href="' .
                                                        route('admin.accounts.show', $asset->id) .
                                                        '"><i class="fa fa-eye "></i> كشف حساب</a>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                    echo '</div>';

                                                    if ($asset->subAssets->isNotEmpty()) {
                                                        echo '<div class="collapse collapse-border" id="link-' .
                                                            $asset->id .
                                                            '-' .
                                                            $level .
                                                            '">';
                                                        echo '<div class="mar-side">';
                                                        renderNestedAccounts($asset->subAssets, $level + 1);
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                }
                                            }
                                        @endphp

                                        @foreach ($sidebarAssets as $asset)
                                            <div class="d-flex mb-2">
                                                <a class="item bg-primary mx-2" data-bs-toggle="collapse"
                                                    href="#link-{{ $asset->id }}"> <i
                                                        class="fa fa-caret-down  arrow-after"></i>
                                                    <i class="arrow-before fa fa-caret-left "></i>
                                                    <div class="content-item">
                                                        <i class="fa fa-list "></i>
                                                        {{ $asset->account_no }} - {{ $asset->name }}
                                                    </div>
                                                </a>

                                                <div class="dropdown">
                                                    <a href="#" class="btn-action dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"></a>
                                                    <div class="dropdown-menu dropdown-menu-end" style="padding:10px">
                                                        <button wire:click="chooseAccount({{ $asset->id }})"
                                                            class="d-block btn btn-sm btn-success w-100 mb-1"
                                                            type="button"><i class="fa fa-plus "></i> أضف</button>

                                                        <button wire:click="edit({{ $asset->id }})"
                                                            class="d-block  btn btn-sm btn-info w-100 mb-1"
                                                            type="button"><i class="fa fa-edit "></i> تعديل</button>

                                                        <button class="d-block  btn btn-danger btn-sm w-100 mb-1"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#delete"
                                                            wire:click="itemId({{ $asset->id }})">
                                                            <i class="fa fa-trash "></i> حذف</button>

                                                        <a class="text-white d-block w-100 mb-1 btn btn-dark btn-sm"
                                                            href="{{ route('admin.accounts.show', $asset->id) }}"><i
                                                                class="fa fa-eye "></i> كشف
                                                            حساب</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($asset->subAssets->isNotEmpty())
                                                <div class="collapse collapse-border" id="link-{{ $asset->id }}">
                                                    <div class="mar-side">
                                                        @php
                                                            renderNestedAccounts($asset->subAssets, 1);
                                                        @endphp
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                @include('livewire.admin.accounting.delete')
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            @if (auth()->user()->can('create_accounts') && auth()->user()->can('update_accounts'))
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">اسم الحساب</label>
                                                    <input type="text" class="form-control mb-2"
                                                        wire:model="name">

                                                    @error('name')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">الحساب الرئيسي</label>
                                                    <select wire:model.live="parent_id" class="form-select mb-2">
                                                        <option value="">اختر</option>
                                                        @foreach ($all_accounts as $account_item)
                                                            <option value="{{ $account_item->id }}">
                                                                {{ $account_item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('parent_id')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">رقم الحساب</label>
                                                    <input type="text" class="form-control mb-2"
                                                        wire:model="account_no" readonly>
                                                    @error('account_no')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نوع الحساب</label>
                                                    <select wire:model="balance_type" class=" form-select">
                                                        <option value="">اختر</option>
                                                        <option value="credit">دائن</option>
                                                        <option value="debit">مدين</option>
                                                    </select>

                                                    @error('balance_type')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" wire:click="save">حفظ</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('css')
    <style>
        .mar-side .item-list.active {
            background-color: rgba(255, 255, 255, 0.9);
            color: #343a40;
        }

        .option-section {
            display: flex;
            flex-direction: column;
            padding: 15px
        }

        .option-section .item {
            padding: 7px 10px;
            border-radius: 4px;
            color: #fff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            display: flex;
            gap: 10px;
            position: relative;
            font-size: 13px;
            align-items: center;
            margin-bottom: 5px;
            text-decoration: none;
            width: 100%;
        }

        .option-section .item .arrow-after {
            display: none;
        }

        .option-section .item[aria-expanded=true] .arrow-before {
            display: none;
        }

        .option-section .item[aria-expanded=true] .arrow-after {
            display: block;
        }

        .option-section .item .arrow-after,
        .option-section .item .arrow-before {
            color: #fff;
            font-size: 14px;
        }

        .option-section .item .content-item {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .option-section .item .content-item i,
        .option-section .item .content-item svg {
            color: #fff;
            font-size: 16px;
        }

        .option-section .collapse-border {
            position: relative;
        }

        .option-section .collapse-border .item::before {
            content: "";
            position: absolute;
            right: -16px;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            width: 16px;
            height: 1px;
        }

        .option-section .collapse-border::before {
            content: "";
            position: absolute;
            right: 13.5px;
            top: 0;
            height: calc(100% - 17px);
            width: 1px;
            background-color: #000;
        }

        .option-section .mar-side {
            margin-right: 30px;
        }

        .btn_add {
            height: 28px;
            margin-top: 3px;
        }
    </style>
@endpush
