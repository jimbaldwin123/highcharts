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
        $(function () {
            $('#container').highcharts({
                chart: {
                type: 'column'
                },
                title: {
                    text: 'Bills Printed by Year'
                },
                xAxis: {
                    categories: [
                        @foreach($bills as $bill)
                            '{{$bill->year}}',
                        @endforeach
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Number of Bills'
                    }
                },
                series: [{
                    name: 'Ones',
                    data: [
                        @foreach($bills as $bill)
                                {{$bill->ones}},
                        @endforeach
                    ]
                }, {
                    name: 'Twos',
                    data: [
                        @foreach($bills as $bill)
                                {{$bill->twos}},
                        @endforeach
                    ]
                }, {
                    name: 'Fives',
                    data: [
                        @foreach($bills as $bill)
                        {{$bill->fives}},
                        @endforeach
                    ]
                }, {
                    name: 'Tens',
                    data: [
                        @foreach($bills as $bill)
                        {{$bill->tens}},
                        @endforeach
                    ]
                }, {
                    name: 'Twenties',
                    data: [
                        @foreach($bills as $bill)
                        {{$bill->twenties}},
                        @endforeach
                    ]
                }, {
                    name: 'Fifties',
                    data: [
                        @foreach($bills as $bill)
                        {{$bill->fifties}},
                        @endforeach
                    ]
                }, {
                    name: 'Hundreds',
                    data: [
                        @foreach($bills as $bill)
                        {{$bill->hundreds}},
                        @endforeach
                    ]
                }

                ]
            });
        });
    </script>
@endsection
