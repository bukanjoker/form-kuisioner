@php
    $formTitle = 'Data Kuisioner'
@endphp

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <title>{{$formTitle}}</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">

        <style>
            .app-container {
                max-width: 800px;
                min-width: 600px;
                margin: auto;
                overflow: auto;
            }
            table {
                font-size: 0.8rem;
            }
        </style>
        
        @include('partials.header')
    </head>
    <body>
        <div class="app-container">
            <div class="p-3">
                <div class="mb-5">
                    <p>Total User Assigned : <b>{{$userAssigned}}</b></p>
                    <p>Total User Completed : <b>{{$userComplete}}</b></p>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <div class="h5">Result Quisionaire by Completed User</div>
                    <button type="button" onclick="exportCSV()" class="btn btn-primary btn-sm">Export CSV</button>
                </div>
                <table id="result-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Word_1</th>
                            <th>Word_2</th>
                            <th>Total (S)</th>
                            <th>Mean (S)</th>
                            <th>GS</th>
                            <th>Total (R)</th>
                            <th>Mean (R)</th>
                            <th>GR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->word_1}}</td>
                                <td>{{$item->word_2}}</td>
                                <td>{{$item->total_similarity}}</td>
                                <td>{{$item->mean_similarity}}</td>
                                <td>{{$item->GS}}</td>
                                <td>{{$item->total_relatedness}}</td>
                                <td>{{$item->mean_relatedness}}</td>
                                <td>{{$item->GR}}</td>
                            </tr>
                        @endforeach
                        @if (count($data) == 0)
                            <tr><td class="text-center" colspan="9">no data</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
        <script src="/js/jquery.min.js" crossorigin="anonymous"></script>
        <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- excel library -->
        <script src="https://cdn.jsdelivr.net/npm/exceljs@4.2.0/dist/exceljs.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>
        
        <script>
            function exportCSV() {
                // intial
                var workbook = new ExcelJS.Workbook();
                var sheet = workbook.addWorksheet('Sheet 1');
                var filename = "result-kuisioner.csv";

                // inserting data
                var xls_content = []

                var xls_header = [
                    "word_1",
                    "word_2",
                    "total_s",
                    "mean_s",
                    "gs",
                    "total_r",
                    "mean_r",
                    "gr"
                ]
                xls_content.push(xls_header)

                var data = {!! json_encode($data) !!}
                data.map(function(item) {
                    var dataItem = [
                        item.word_1,
                        item.word_2,
                        item.total_similarity,
                        item.mean_similarity,
                        item.GS,
                        item.total_relatedness,
                        item.mean_relatedness,
                        item.GR
                    ]

                    xls_content.push(dataItem)
                })
                sheet.addRows(xls_content)

                // exporting
                workbook.csv.writeBuffer().then(function(datas) {
                    var blob = new Blob([datas], {
                        type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                    });

                    var currentTime = new Date().getDate().toString().padStart(2, "0") + (Number(new Date().getMonth()) + 1).toString().padStart(2, "0") + new Date().getFullYear();
                    saveAs(blob, filename);
                })
            }
        </script>
    </body>
</html>