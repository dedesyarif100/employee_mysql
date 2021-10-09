@extends('main')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="demo-container">
                <div id="chart"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>
<script>
    $(function(){
        var chartInstance = $("#chart").dxChart({
            rotated: true,
            title: "Olympic Gold Medals in 2008",
            dataSource: goldMedals,
            series: {
                color: "#f3c40b",
                argumentField: "country",
                valueField: "medals",
                type: "bar",
                label: {
                    visible: true
                }
            },
            legend: {
                visible: false
            }
        }).dxChart("instance");
    });
</script>
@endsection
