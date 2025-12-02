<div class="main-side">
    @section('title', 'الميزانية')

    <div class="container-fluid">
        <div class="d-flex mb-3 gap-3 align-items-center ">
            <a href="{{ route('admin.accounting') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-angle-right"></i>
            </a>
            <h4 class="main-heading m-0">الميزانية</h4>
        </div>
        <div class="bg-white p-4 rounded-2 shadow">

            <div class="d-flex align-items-end justify-content-between mb-2">
                <div class="d-flex gap-2">

                    <div class="mb-3">
                        <label for="duration-to" class="small-label">من</label>
                        <input type="date" class="form-control" wire:model="from" id="duration-to" />
                    </div>
                    <div class="mb-3">
                        <label for="duration-to" class="small-label">إلى</label>
                        <input type="date" class="form-control" wire:model="to" id="duration-to" />
                    </div>
                </div>
                <button class="btn btn-warning btn-sm text-light" id="btn-prt-content">
                    <i class="fas fa-print"></i> طباعة
                </button>
            </div>

            <div id="prt-content" class="table-print">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الأصول</th>
                                <th>الخصوم</th>
                                <th>حقوق الملكية</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @foreach ($assets as $asset)
                                        <p>{{ $asset->name }}: {{ calculateBalance($asset, $from, $to) }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($liabilities as $liability)
                                        <p>{{ $liability->name }}: {{ calculateBalance($liability, $from, $to) }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($equities as $equity_item)
                                        <p>{{ $equity_item->name }}: {{ calculateBalance($equity_item, $from, $to) }}
                                        </p>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>البند</th>
                                <th>المبلغ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>إجمالي الأصول</strong></td>
                                <td>{{ number_format($totalAssets, 2) }}</td>
                            </tr>
                            <tr>
                                <td><strong>إجمالي الخصوم</strong></td>
                                <td>{{ number_format($totalLiabilities, 2) }}</td>
                            </tr>
                            <tr>
                                <td><strong>إجمالي حقوق الملكية</strong></td>
                                <td>{{ number_format($totalEquities, 2) }}</td>
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
            htmlToCSV(html, "report.csv");
        });
    </script>
@endpush
