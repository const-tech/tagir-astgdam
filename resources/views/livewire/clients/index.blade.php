<div class="{{ request()->is('*/admin/*') ? 'main-side' : ' users ' }}">
    @if ($screen == 'index')
        <x-admin-alert></x-admin-alert>
        <div class="">
            <div class="">
                <div class="d-flex align-items-center flex-column flex-xl-row justify-content-between gap-3 mb-3">
                    <div class="main-heading mb-0 me-auto me-xl-0">
                        <div class="large">العملاء</div>
                    </div>


                    <div class="box-search">
                        <img src="{{ asset('admin-asset/img/icons/search.png') }}" alt="icon" />
                        <input type="search" wire:model.live="search" id="" placeholder="@lang('Search')" />
                    </div>
                </div>
                <div class="bar-options d-flex align-items-center justify-content-start flex-wrap gap-1 mb-2">
                    <button class="main-btn" wire:click='$set("screen","create")'>@lang('Add') <i
                            class="fas fa-plus"></i></button>
                    <button class="main-btn btn-main-color" wire:click='$set("filter_active","")'>@lang('All companies'):
                        {{ $allClients->count() }}</button>
                    <button class="main-btn" wire:click="$set('filter_active','active')">@lang('Activated companies'):
                        {{ \App\Models\User::Clients()->Active()->count() }}</button>
                    <button class="main-btn bg-danger" wire:click="$set('filter_active','inactive')">@lang('Unactivated companies'):
                        {{ \App\Models\User::Clients()->InActive()->count() }}</button>
                    <button class="btn btn-sm text-light bg-warning" id="btn-prt-content"><i
                            class="fa-solid fa-print"></i>
                    </button>
                </div>

                <div class="table-responsive" id="prt-content">
                    <table class="main-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Name')</th>
                                <th>الرقم الضريبي</th>
                                <th>@lang('Phone')</th>
                                <th>@lang('City')</th>
                                <th>@lang('E-Mail Address')</th>
                                <th>@lang('Address')</th>
                                <th>السجل التجاري</th>
                                <th>العنوان الوطنى</th>
                                <th>هوية المدير</th>
                                <th>شهادة ال VAT </th>
                                <th class="not-print">المشاريع</th>
                                <th class="not-print">@lang('Active')</th>
                                <th class="text-center not-print">@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->tax_number }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->city?->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->commercial_register }}
                                        @if ($client->file_commercial_register)
                                            <a href="{{ display_file($client->file_commercial_register) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" target="_blank"
                                                data-bs-title="معاينة المرفق" class="btn-light-purple"><i
                                                    class="fas fa-eye icon-table"></i></a>
                                        @endif
                                    </td>
                                    <td>{{ $client->national_address }}
                                        @if ($client->file_national_address)
                                            <a href="{{ display_file($client->file_national_address) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" target="_blank"
                                                data-bs-title="معاينة المرفق" class="btn-light-purple"><i
                                                    class="fas fa-eye icon-table"></i></a>
                                        @endif
                                    </td>
                                    <td>{{ $client->manager_identity }}
                                        @if ($client->file_manager_identity)
                                            <a href="{{ display_file($client->file_manager_identity) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" target="_blank"
                                                data-bs-title="معاينة المرفق" class="btn-light-purple"><i
                                                    class="fas fa-eye icon-table"></i></a>
                                        @endif
                                    </td>
                                    <td>{{ $client->vat_certificate }}

                                        @if ($client->file_vat_certificate)
                                            <a href="{{ display_file($client->file_vat_certificate) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" target="_blank"
                                                data-bs-title="معاينة المرفق" class="btn-light-purple"><i
                                                    class="fas fa-eye icon-table"></i></a>
                                        @endif
                                    </td>
                                    <td class="not-print"><a
                                            href="{{ route('admin.projects', ['client_id' => $client->id]) }}"
                                            class="btn-light-purple">
                                            {{ $client->projects->count() }}<i class="fas fa-eye"></i></a></td>
                                    <td class="not-print">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" wire:click="toggle({{ $client->id }})"
                                                @checked($client->active) type="checkbox" role="switch"
                                                id="">
                                        </div>
                                    </td>
                                    <td class='not-print'>
                                        <div class="btn-holder d-flex align-items-center justify-content-center gap-3">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#sendToWhatsapp"
                                                wire:click="clientId({{ $client->id }})">
                                                <img src="{{ asset('admin-asset/img/icons/whatsapp.png') }}"
                                                    alt="whatsapp icon" width="20">
                                            </button>
                                            <button class="" wire:click="clientId({{ $client->id }})"
                                                data-bs-target="#send_notification{{ $client->id }}"
                                                data-bs-toggle="modal">
                                                <i class="fa fa-bell"></i>
                                            </button>

                                            <button type="button" wire:click='edit({{ $client->id }})'>
                                                <i class="fas fa-pen text-info icon-table"></i>
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fas fa-trash text-danger icon-table"></i>
                                            </button>
                                            <div class="modal fade" id="exampleModal" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">حذف </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            هل انت متأكد من الحذف؟
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary btn-sm px-3"
                                                                data-bs-dismiss="modal">الغاء
                                                            </button>
                                                            <button data-bs-dismiss="modal"
                                                                class="btn btn-danger btn-sm px-3"
                                                                wire:click='delete({{ $client->id }})'>حذف
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="send_notification{{ $client->id }}"
                                                aria-hidden="true" wire:ignore.self>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="showModalLabel">ارسال
                                                                اشعار
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button wire:click="send_notification" type="button"
                                                                class="btn btn-success btn-sm px-3"
                                                                data-bs-dismiss="modal">إرسال
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-secondary btn-sm px-3"
                                                                data-bs-dismiss="modal">الغاء
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan='12' class="text-center">
                                        <div class="alert alert-warning mb-0">
                                            @lang('No results')
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                    <!-- Modal -->
                    <div class="modal fade" id="sendToWhatsapp" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="showModalLabel">إرسال رسالة عبر الواتس اب
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <textarea wire:model="message" rows="5" class="form-control"></textarea>

                                    <div class="form-group">
                                        <label for="">@lang('Photo')</label>
                                        <input type="file" wire:model="image" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button wire:click="sendToWhatsapp" type="button"
                                        class="btn btn-success btn-sm px-3" data-bs-dismiss="modal">إرسال
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm px-3"
                                        data-bs-dismiss="modal">الغاء
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        <x-admin-alert></x-admin-alert>
        @include('livewire.clients.createOrUpdate')
    @endif
</div>
