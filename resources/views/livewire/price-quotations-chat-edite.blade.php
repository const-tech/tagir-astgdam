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
    <div class="row g-4 pb-5">
        <div class="row">

            @for ($x = 1; $x <= 14; $x++)
                <div wire:ignore class="mb-2 col-12">
                    <label class="form-label">البند {{ $x }} </label>
                    <textarea rows="5" wire:model="item_{{ $x }}" id="editor{{ $x }}"></textarea>
                </div>
            @endfor



        </div>
        <div class=" mt-3 col-6 d-flex justify-content-end">
            <a {{-- href="{{route('admin.prices.show')}}" --}} wire:click="submit" class="main-btn px-5">حفظ</a>
        </div>
    </div>
</div>


@push('js')
<script src="https://cdn.tiny.cloud/1/mt1iah20fgcfgolvmikfl2j9qka5yqiz51ln34mx637d1033/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


    {{-- <script src="https://cdn.tiny.cloud/1/no-origin/tinymce/7.5.1-116/tinymce.min.js"></script> --}}
    {{-- <script src="https://cdn.tiny.cloud/1/db81owptdi5rbi87me89pft5rtmwyotdz0nxjbx50g41hwdh/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    <script>
        tinymce.init({
            selector: '#editor1',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_1', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor2',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_2', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor3',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_3', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor4',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_4', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor5',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_5', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor6',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_6', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor7',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_7', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor8',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_8', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor9',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_9', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor10',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_10', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor11',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_11', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor12',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_12', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor13',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_13', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor14',
            directionality: 'rtl',

            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('item_14', editor.getContent());
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
