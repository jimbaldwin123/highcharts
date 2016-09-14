@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;</div>

                <div id="container" class="panel-body">

                    {{--@foreach ($bills as $bill)--}}
                        {{--<p>This is for year {{ $bill->year }}</p>--}}
                    {{--@endforeach--}}


                </div>
                <div style="margin-left:50px;margin-bottom:20px;"><strong>Source:</strong> https://inventory.data.gov/dataset/annual-production-figures-of-united-states-currency-1404362868</div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('chart')
<script src="js/chartapi.js"></script>
@endsection

