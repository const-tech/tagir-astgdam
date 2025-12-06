<div id="main-container" class="main-section users container">
<div class="main-heading">
        <div class="large">
            العقود العامة
        </div>
    </div>

    <div class="btn-holder d-flex align-items-center justify-content-between gap-3 flex-wrap mb-2">
        <div class="btn-holder d-flex align-items-center gap-1">
            <a href="{{request()->is('*/admin/*') ? route('admin.contracts.form') : route('contracts.form') }}" class="main-btn">{{ __('Add') }} <i
                    class="fas fa-plus"></i></a>
            <button class="main-btn bg-success" wire:click="$set('filter_expire','active')">عقود سارية :
                {{ App\Models\Contract::where('contract_end_at', '>=', now())->count() }} </button>
            <button class="main-btn bg-danger" wire:click="$set('filter_expire','inactive')">عقود منتهية :
                {{ App\Models\Contract::where('contract_end_at', '<', now())->count() }} </button>
        </div>
        <div class="box-search">
            <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
            <input wire:model.live="search" id="search" placeholder="ابحث برقم العقد">
        </div>
    </div>

    <div class="table-responsive">
        <table class="main-table mb-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('admin.Client')</th>
                    <th>@lang('admin.Contract start at')</th>
                    <th>تاريخ نهاية العقد</th>
                    <th>قيمه العقد المالية</th>
                    <th>المدفوع مقدم</th>
                    <th>المتبقي</th>
                    <th>المدينة</th>
                    <th>الملف</th>
                    <th>@lang('admin.Control')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contracts as $contract)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contract->client?->name }}</td>
                        <td>{{ $contract->contract_start_at }}</td>
                        <td>{{ $contract->contract_end_at }}</td>
                        <td>{{ $contract->amount }}</td>
                        <td>{{ $contract->paid }}</td>
                        <td>{{ $contract->rest }}</td>
                        <td>{{ $contract->city?->name }}</td>
                        <td>
                            @if ($contract->file)
                                <a target="_blank" href="{{ display_file($contract->file) }}"
                                    class="btn btn-primary btn-sm">معاينه</a>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <button class="btn-tooltip" data-bs-toggle="modal" data-bs-target="#contractDeal">
                                    <i class="fas fa-file-contract table-icon text-secondary"></i>
                                    <span class="tip">معاينة بنود العقد</span>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="contractDeal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">بنود العقد</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $contract->contract_terms }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm px-3"
                                                    data-bs-dismiss="modal">الغاء</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.contracts.form', $contract->id) }}"><i
                                        class="fa fa-pen table-icon text-info"></i></a>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $contract->id }}"><i
                                        class="fa fa-trash table-icon text-danger"></i></button>
                                <div class="modal fade" id="delete{{ $contract->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ __('Delete :model', ['model' => 'العقد']) }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('Are you sure to delete the :model ?', [
                                                    'model' => 'العقد رقم ' . $contract->contract_number,
                                                ]) }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm px-3"
                                                    data-bs-dismiss="modal">{{ __('admin.Cancel') }}</button>
                                                <button wire:click="delete({{ $contract->id }})"
                                                    data-bs-dismiss="modal"
                                                    class="btn btn-primary btn-sm px-3">@lang('admin.Delete')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{ $contracts->links() }}
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const currentUrl = window.location.pathname;

            if (currentUrl.includes("/admin/")) {
                document.getElementById("main-container").className = "main-side";
            }
        });
    </script>

</div>
