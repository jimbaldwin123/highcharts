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

    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.split(search).join(replacement);
    };

  $(document).ready(function(){
      var year;
      var fields = [];
      var entryvalue;
      var hcdata = {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Bills Printed by Year  - from API'
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

      $.ajax({
        url: '/chart/api',
        type: 'GET',
        success: function(datastring) {
            var data = JSON.parse(datastring);
            console.log(JSON.stringify(data));
            data.result.fields.forEach(function(row){
                if(row.id.indexOf('Bill') !== -1) {
                    fields.push(row.id);
                }
            });
            console.log(fields);
            data.result.records.forEach(function(row){
                year = parseInt(row['Fiscal Year'].split(' ')[1]);
                hcdata.xAxis.categories.push(year);

            });


            var aRow = [];

//            data.result.records.forEach(function(entry) {
//                hcdata.xAxis.categories.push(entry.year);
//            });

                fields.forEach(function(name){

                    aRow[name] = {name: '', data:[]};
                    aRow[name].name = toTitleCase(name);
                    data.result.records.forEach(function(entry) {
                        entryvalue = entry[name].replaceAll(',','');
                        entryvalue = parseInt(entryvalue.replaceAll('N/A','0'));
                        aRow[name].data.push(entryvalue);
                    });
                    hcdata.series.push(aRow[name]);
                });
console.log(JSON.stringify(hcdata));
            $('#container').highcharts(hcdata);
        }
      });
  });
</script>
@endsection

