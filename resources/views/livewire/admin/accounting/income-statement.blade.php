@section('title')
    @lang('Income Statement')
@endsection
@push('css')
    <style>
        .level-1 {
            font-weight: bold !important;
            padding-right: 10px !important;
        }

        .level-2 {
            padding-right: 40px !important;
        }

        .level-3 {
            padding-right: 70px !important;
        }

        .level-4 {
            padding-right: 100px !important;
        }

        .level-5 {
            padding-right: 130px !important;
        }

        .level-6 {
            padding-right: 160px !important;
        }

        .table {
            text-align: inherit !important;
        }
    </style>
@endpush
<div class="main-side">
    <div class="container">
        <div class="d-flex mb-3 gap-3 align-items-center ">
            <a href="{{ route('admin.accounting') }}" class="btn bg-main-color text-white">
                <i class="fas fa-angle-right"></i>
            </a>
            <h4 class="main-heading m-0">@lang('Income Statement')</h4>
        </div>
        <div class="Cli&doc-report-content bg-white p-4 rounded-2 shadow">

            <div class="d-flex align-items-end justify-content-between mb-2">
                <div class="d-flex gap-2">

                    <div class="box-info">
                        <label for="duration-to" class="small-label">{{ __('admin.from') }}</label>
                        <input type="date" class="form-control" wire:model="from" id="duration-to" />
                    </div>
                    <div class="box-info">
                        <label for="duration-to" class="small-label">{{ __('admin.to') }}</label>
                        <input type="date" class="form-control" wire:model="to" id="duration-to" />
                    </div>
                    <div class="box-info">
                        <label for="duration-to" class="small-label">{{ __('admin.level') }}</label>
                        <select wire:model="level" class="form-select">
                            @for ($i = 1; $i < 7; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="left-holder d-flex justify-content-end mb-2">
                

                <button class="btn btn-sm btn-outline-warning ms-2" id="btn-prt-content">
                    <i class="fa-solid fa-print"></i>
                    <span>{{ __('admin.print') }}</span>
                </button>
                <button class="btn btn-sm btn-outline-info" id="export-btn">
                    <i class="fa-solid fa-file-excel"></i>
                    <span>{{ __('admin.Export') }} Excel</span>
                </button>
            </div>

            <div id="prt-content" class="table-print">
                <div class="table-responsive">
                    <table class="table table-bordered mt-5" id="data-table">
                        <thead>
                            <tr>
                                <th>رقم الحساب</th>
                                <th>اسم الحساب</th>
                                <th>الرصيد</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                function renderNestedAccounts($assets, $level, $currentLevel = 1, $from, $to)
                                {
                                    foreach ($assets as $asset) {
                                        if ($currentLevel <= $level) {
                                            echo '<tr>';
                                            echo '<td>' . $asset->number . '</td>';
                                            echo '<td class="level-' . $currentLevel . '">' . $asset->name . '</td>';
                                            echo '<td>' . calculateBalance($asset, $from, $to) . '</td>';
                                            echo '</tr>';

                                            if ($asset->subAssets->isNotEmpty()) {
                                                renderNestedAccounts(
                                                    $asset->subAssets,
                                                    $level,
                                                    $currentLevel + 1,
                                                    $from,
                                                    $to,
                                                );
                                            }
                                        }
                                    }
                                }

                                $selectedLevel = $level ?? 1;
                            @endphp

                            @foreach ($accounts as $asset)
                                @php
                                    renderNestedAccounts([$asset], $selectedLevel, 1, $from, $to);
                                @endphp
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th>البند</th>
                                <th>المبلغ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">إجمالي الإيرادات</td>
                                <td class="font-weight-bold">{{ number_format($revenues, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">إجمالي المصروفات</td>
                                <td class="font-weight-bold">
                                    {{ number_format($expenses, 2) }}</td>
                            </tr>
                            {{-- <tr>
                            <td class="font-weight-bold">الربح التشغيلي</td>
                            <td class="font-weight-bold">{{ number_format($operating_profit, 2) }}</td>
                        </tr> --}}
                            <tr>
                                <td class="font-weight-bold">صافي الربح</td>
                                <td class="font-weight-bold">{{ number_format($net_profit, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        function printData() {
            let divToPrint = document.getElementById("data-table");
            newWin = window.open("");
            newWin.document.head.replaceWith(document.head.cloneNode(true));
            newWin.document.body.appendChild(divToPrint.cloneNode(true));
            setTimeout(() => {
                newWin.print();
                newWin.close();
            }, 600);
        }
        document.getElementById("print-btn").addEventListener("click", printData);

        function downloadCSVFile(csv, filename) {
            var csv_file, download_link;
            csv_file = new Blob(["\uFEFF" + csv], {
                type: "text/csv"
            });
            download_link = document.createElement("a");
            download_link.download = filename;
            download_link.href = window.URL.createObjectURL(csv_file);
            download_link.style.display = "none";
            document.body.appendChild(download_link);
            download_link.click();
        }

        function htmlToCSV(html, filename) {
            var data = [];
            var rows = document.querySelectorAll("table tr");
            for (var i = 0; i < rows.length; i++) {
                var row = [],
                    cols = rows[i].querySelectorAll("td, th");
                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
                }
                data.push(row.join(","));
            }
            downloadCSVFile(data.join("\n"), filename);
        }
        document.getElementById("export-btn").addEventListener("click", function() {
            var html = document.getElementById("data-table").outerHTML;
            htmlToCSV(html, "income_statement.csv");
        });
    </script>
@endpush
