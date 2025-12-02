<div class="main-side">
    <div class="main-title">
        <div class="small">
            @lang('Home')
        </div>
        <div class="large">
            عرض الاسعار
        </div>
    </div>
    <x-message-admin/>
    @if ($screen === 'index')
        <div class="bar-options d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
            <div class="btn-holder">
                <button wire:click="$set('screen','create')" class="main-btn">@lang('Add')</button>
            </div>
            <div class="box-search">
                <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon"/>
                <input wire:model.live="search" type="search" id="search" placeholder="@lang(' Search')"/>
            </div>
        </div>
        <div class="table-responsive">
            <table class="main-table mb-2">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم العميل</th>
                    <th>رقم الجوال</th>
                    <th>البريد الالكتروني</th>
                    <th>@lang('Actions')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($priceQuotations as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->client?->name }}</td>
                        <td>{{ $item->client?->phone }}</td>
                        <td>{{ $item->client?->email }}</td>
                        <td class="">
                            <div class="d-flex align-items-center gap-3">

                                <a class="text-primary btn-tooltip"
                                   href="{{ route('admin.prices.show', ['price_quotation' => $item->id, 'screen' => 'contract']) }}">
                                    <i class="fa fa-eye"></i>
                                    <span class="tip">العقد</span>
                                </a>
                                <a class="text-primary btn-tooltip"
                                   href="{{ route('admin.prices.show', ['price_quotation' => $item->id, 'screen' => 'contract_ar']) }}">
                                    <i class="fa-solid fa-file-contract"></i>
                                    <span class="tip">العقد باللغه العربيه</span>
                                </a>
                                <a class="text-primary btn-tooltip"
                                   href="{{ route('admin.prices.show', ['price_quotation' => $item->id, 'screen' => 'en']) }}">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                    <span class="tip">Show Price</span>
                                </a>
                                <a class="text-primary btn-tooltip"
                                   href="{{ route('admin.prices.show', $item->id, ['screen' => 'ar']) }}">
                                    <i class="fa-solid fa-money-bills"></i>
                                    <span class="tip">عرض السعر</span>
                                </a>
                                <button wire:click="edit({{ $item->id }})" type="button">
                                    <i class="fa-solid fa-pen text-info icon-table"></i>
                                </button>
                                <x-delete-modal :item="$item"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-0 py-1" colspan="4">
                            <ul class="bar-status mx-auto">
                                <li @class(['active' => $item->status !== 'canceled'])>
                                    بالانتظار
                                    <span class="circle"></span>
                                </li>
                                <li @class([
                                        'active' => in_array($item->status, ['accepted', 'finished']),
                                    ])>
                                    تمت الموافقة
                                    <span class="circle"></span>
                                </li>
                                <li class=" @class(['active' => $item->status == 'finished'])">
                                    منتهى
                                    <span class="circle "></span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-danger">لا يوحد بيانات</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            {{ $priceQuotations->links() }}
        </div>
    @else
        <form wire:submit.prevent="submit" class="row">
            <div class="col-sm-6">
                <label for="" class="small-label"> العميل</label>
                <select wire:model.live="client_id" class="form-select">
                    <option value="">اختر</option>
                    @foreach(\App\Models\User::clients()->get() as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>

                @php
                    $company = \App\Models\User::find($client_id);
                @endphp
                @if($company)
                    <label for="" class="small-label"> البريد الالكتروني</label>
                    <input value="{{$company->name}}" class="form-control">

                    <label for="" class="small-label"> رقم الجوال</label>
                    <input value="{{$company->phone}}" class="form-control">
                @endif


            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="btn-holder mt-2">
                    <button class="main-btn">التالي</button>
                </div>
            </div>
        </form>
    @endif
</div>
