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


            @for ($x = 0; $x < 14; $x++)
                <div wire:ignore class="mb-2 col-6">
                    <label class="form-label"> البند {{ $x + 1 }} عربى</label>
                    <textarea rows="5" wire:model="band_ar_{{ $x + 1 }}" id="editor{{ $x + 1 }}"></textarea>
                </div>
                <div wire:ignore class="mb-2 col-6">
                    <label class="form-label"> البند {{ $x + 1 }} انجليزى</label>
                    <textarea rows="5" wire:model="band_en_{{ $x + 1 }}" id="editor2{{ $x + 1 }}"></textarea>
                </div>
            @endfor

        </div>
        <div class=" mt-3 col-6 d-flex justify-content-end">
            <a wire:click="submit" class="main-btn px-5">حفظ</a>
        </div>
    </div>
</div>
@push('js')
<script src="https://cdn.tiny.cloud/1/mt1iah20fgcfgolvmikfl2j9qka5yqiz51ln34mx637d1033/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

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
                    set('band_ar_1', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor21',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_1', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor2',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_2', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor22',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_2', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor3',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_3', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor23',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_3', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor4',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_4', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor24',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_4', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor5',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_5', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor25',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_5', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor6',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_6', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor26',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_6', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor7',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_7', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor27',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_7', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor8',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_8', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor28',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_8', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor9',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_9', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor29',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_9', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor10',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_10', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor210',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_10', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor11',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_11', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor211',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_11', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor12',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_12', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor212',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_12', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor13',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_13', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor213',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_13', editor.getContent());
                });
            }

        });
    </script>
    <script>
        tinymce.init({
            selector: '#editor14',
            directionality: 'rtl',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_ar_14', editor.getContent());
                });
            }

        });
        tinymce.init({
            selector: '#editor214',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.
                    set('band_en_14', editor.getContent());
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
