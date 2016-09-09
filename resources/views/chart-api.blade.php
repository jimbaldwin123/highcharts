@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div id="container" class="panel-body">

                    {{--@foreach ($bills as $bill)--}}
                        {{--<p>This is for year {{ $bill->year }}</p>--}}
                    {{--@endforeach--}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('chart')
<script>
    // TODO
    //  - read from API
    //  - do API request server side w/ guzzle
    //  - make slider for years
    //  - put into elixir/gulp

    function toTitleCase(str){
        return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
  $(document).ready(function(){
      $.ajax({
        url: '/chart/api',
        type: 'GET',
        success: function(datastring) {
            var data = JSON.parse(datastring);
//            console.log(JSON.stringify(data.result.records));
            data.result.records.forEach(function(row){
                console.log(row['Fiscal Year'].split(' ')[1]);
            });
            var hcdata = {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Bills Printed by Year'
                },
                xAxis: {
                    categories: [
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Number of Bills'
                    }
                },
                series: []
            }

            var aRow = [];
            var names = ['ones','twos','fives','tens','twenties','fifties','hundreds'];

            data.forEach(function(entry) {
                hcdata.xAxis.categories.push(entry.year);
            });

                names.forEach(function(name){

                    aRow[name] = {name: '', data:[]};
                    aRow[name].name = toTitleCase(name);
                    data.forEach(function(entry) {
                        aRow[name].data.push(entry[name]);
                    });
                    hcdata.series.push(aRow[name]);
                });

            $('#container').highcharts(hcdata);
        }
      });
  });
</script>
@endsection

