@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Daily Questions</h3></div>

                <div class="panel-body">
                     <questions></questions>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>History</h3></div>

                <div class="panel-body">
                     <history></history>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

