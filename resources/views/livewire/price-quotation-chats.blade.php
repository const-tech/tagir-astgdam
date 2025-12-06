<div class="main-side">
    @push('css')
        <style>
            .accordion-button::after {
                margin-left: 0;
                margin-right: auto;
                transform: rotate(180deg);
            }

            .accordion-button.collapsed::after {
                transform: rotate(0deg);
            }

            .accordion-button:not(.collapsed) {
                background-color: #6c757d;
                color: white;
            }

            .accordion-button:focus {
                box-shadow: none;
                border-color: rgba(0, 0, 0, .125);
            }
        </style>
    @endpush
    <div class="d-flex justify-content-between">
        <div class="main-title">
            <div class="small">
                @lang('Home')
            </div>
            <div class="large">
                عرض الاسعار
            </div>
        </div>
    </div>
    @can('change_status_price_quotation')
        @if ($price_quotation->status == 'pending')
            <button class="mb-3 btn btn-sm btn-success" wire:click="changeStatus('accepted')">موافقة</button>
        @elseif($price_quotation->status == 'accepted')
            <button class="mb-3 btn btn-sm btn-danger" wire:click="changeStatus('finished')">انهاء</button>
        @endif
    @endcan

    <div class="row g-4 pb-5">

        <div class="col-12">
            <div class="chat-container">
                <div class="header-chat">
                    <b>مناقشة العميل:</b> {{ $price_quotation->client?->name }}
                </div>
                <div id="body-chat" class="body-chat">
                    @foreach ($messages as $message)
                        <div class="message {{ $message->user_id !== auth()->id() ? 'received' : '' }}">
                            <img alt="User avatar" class="avatar" height="40"
                                src="{{ asset('admin-asset/img/user-1.png') }}" width="40" />
                            <div class="content-message">
                                <div class="text">
                                    <div class="name purple">
                                        {{ $message->user?->name }}
                                    </div>
                                    {{ $message->content }}
                                </div>
                                <div class="time">
                                    {{ $message->created_at?->format('Y-m-d g:i A') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="message-input">
                    <label for="file" class="btn-file">
                        <i class="fas fa-folder-plus"></i>
                        <input type="file" multiple accept="video/*,image/*,.pdf">
                    </label>

                    <input wire:model="message" placeholder="أكتب رسالتك..." type="text" />
                    <button wire:click="addMessage">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB10lEQVR4nO3XzYtOYRjH8SPGa4lsJm8lRCgWk4UFK7IgO02SnYVS5A/AgpXFJGUliiI2lIWNsvCSLIgsvE7YaEhpSBE+uptrcozz9Mx5eZ4N3+U5p/P7dd3X/bvuO8v+kwPT8RR3sQ0Tsm6CWfjpN4/Qj4ndNPHC3wxiH6Z0w8AFrXkdRqZ10sAB7RnCYczshIH1xs/7MDK7SQMz8F05hnEcvU2ZeKwan8PIvLoGzqjHV5zFkqoG9mqGbziNpWXEl+ODZkk9dR6rWon2Yj8WYg2+4AaO4WJE89sGjKSUvYy+vPiWEEwMxLPCGYCpWIZN2I0jOIebeFNy91zD4ixiNnElVaBCy+QN9mARNmAXDkUPXMfzaM48D7LYOmLo9NQxkDMyGXOxGhuxIyI8VexqJGliOH18ckyyncDagtLPj/7YjJ3RM0dxKqp3O0b5xxLLcDD9fFL87OGYl4MxGVPKNcmPMLyuqHQrI9tfaZ7RcFoxnjXsb1D4U8TzgjJNNNCA8FDlSYk7NYRf1jq0GNnLo8FUhvux9+udH9FXUvgWttYSrTAJ05S79EemN4WRbG934KgV2e0MPCsQfhcdPadjwi0uJikJ93T0GF5wNXuCe9je1RtR9q/yCz2f0DUYHsNiAAAAAElFTkSuQmCC">
                    </button>
                </div>
            </div>


        </div>
        <div class="col-12 mb-3">

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <h4 class="mt-1">المسميات الوظيفية</h4>
                </div>

                <div>
                    <button class="btn btn-outline-success" @click="$wire.addJob()">اضافة مسمى وظيفى <i
                            class="fa fa-plus"></i>
                    </button>
                </div>

            </div>

            @foreach ($jobs as $key => $job)
                <div class="accordion " x-data="{ open: false }">
                    <div class="accordion-item">
                        <h2 class="accordion-header border-0">
                            <button @click="open = !open"
                                class="accordion-button d-flex justify-content-between align-items-center ps-3"
                                :class="{ 'collapsed': !open }" type="button">
                                <span class="text-end w-100">{{ $job->job_title ?? 'المسمى الوظيفى' }} #
                                    {{ $key + 1 }}</span>
                            </button>
                        </h2>

                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100" class="accordion-collapse">
                            <div class="accordion-body">
                                @include('front.job-fields')
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">

            <div wire:ignore class="mb-2 col">
                <label class="form-label">اشتراطات خاصة</label>
                <textarea rows="5" wire:model="special_requirements" id="editor">
            </textarea>
            </div>
            <div wire:ignore class="mb-2 col">
                <label class="form-label">اشتراطات خاصة (الانجليزية)</label>
                <textarea rows="5" wire:model="special_requirements_en" id="editor_en">
            </textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>معد عرض السعر</label>
                    <input class="form-control" wire:model="created_by">
                </div>
                <div class="col-md-6">
                    <label>رقم التواصل</label>
                    <input class="form-control" wire:model="created_by_phone">
                </div>
            </div>

            {{-- <div wire:ignore class="mb-2 col-12">
                <label class="form-label">البنود 1 - 2</label>
                <textarea rows="5" wire:model="items" id="items_en"></textarea>
            </div>
            <div wire:ignore class="mb-2 col-12">
                <label class="form-label">البنود 4 - 14</label>
                <textarea rows="5" wire:model="items_two" id="items_two"></textarea>
            </div> --}}
        </div>
        <div class=" mt-3 col-6 d-flex justify-content-end">
            <a {{-- href="{{route('admin.prices.show')}}" --}} wire:click="submit" class="main-btn px-5">التالي</a>
        </div>

    </div>
</div>
@push('js')
<script src="https://cdn.tiny.cloud/1/tapu6ryxz7pxmzviysxj5e4qahc0in0p3a2nn3cg1mci5k3x/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#editor',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('special_requirements', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor_en',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('special_requirements_en', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#items_en',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('items', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#items_two',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('items_two', editor.getContent());
                });
            }

        });
    </script>
    <script type="module">
        document.addEventListener('scrollToBottom', () => {
            const element = document.querySelector('#body-chat');
            element.scrollTop = element.scrollHeight;
        });
    </script>
@endpush
