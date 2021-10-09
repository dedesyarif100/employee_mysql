@extends('main')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />
<style>
    .input-daterange {
        width: 90%;
        margin-left: 20px;
    }
</style>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="demo-container">
                <div class="input-daterange">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="awal">Awal</label>
                            <input type="date" class="form-control" name="awal" id="awal">
                        </div>
                        <div class="col-md-4">
                            <label for="akhir">Akhir</label>
                            <input type="date" class="form-control" name="akhir" id="akhir">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="filter" id="filter" class="btn btn-primary btn-sm" style="margin-top: 1.7rem; width: 120px;">Filter</button>
                        </div>
                    </div>
                    <br>
                </div>
                <div id="gridContainer"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>
{{-- <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script> --}}

<script>
    $(function() {
        var x = window.matchMedia("(max-width: 700px)");
        let awal = $('#awal').val();
        let akhir = $('#akhir').val();
        let sendData = {
            keyExpr: "ID",
            columnsAutoWidth: true,
            filterRow: { visible: true },
            filterPanel: { visible: true },
            headerFilter: { visible: true },
            scrolling: { rowRenderingMode: 'virtual' },
            showBorders: true,
            columns: [
                {
                    dataField: "employee",
                    dataType: "string",
                },
                {
                    dataField: "authen_date",
                    dataType: "datetime",
                    format: "yyyy-MM-dd",
                },
                {
                    dataField: "time_in",
                    dataType: "datetime",
                    format: "HH:mm:ss",
                },
                {
                    dataField: "time_out",
                    dataType: "datetime",
                    format: "HH:mm:ss",
                },
                {
                    dataField: "total_hours",
                    dataType: "number"
                },
                {
                    dataField: "notes",
                    dataType: "string"
                },
            ],
            paging: {
                pageSize: 10
            },
            pager: {
                visible: true,
                // allowedPageSizes: [5, 10, 'all'],
                // showPageSizeSelector: true,
                showInfo: true,
                showNavigationButtons: true
            }
        };
        myFunction(x);
        x.addListener(myFunction);

        function myFunction(x) {
            prosesFilter(x.matches);
        }

        $('#filter').on('click', function () {
            prosesFilter();
        });

        function prosesFilter(isResponsive = false) {
            awal = $('#awal').val();
            akhir = $('#akhir').val();
            sendData.dataSource = `{{ url('employee/getEmployee') }}?awal=${awal}&akhir=${akhir}`;
            if (isResponsive) {
                sendData.columnWidth = 200;
                sendData.legend = {
                    verticalAlignment: "bottom",
                    horizontalAlignment: "center",
                };
            }
            $("#gridContainer").dxDataGrid(sendData);
        }
    });
</script>
@endsection
