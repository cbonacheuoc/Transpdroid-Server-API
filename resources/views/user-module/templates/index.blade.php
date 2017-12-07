@extends('layouts.dashboard')
@section('page_heading', ucfirst(trans('app.list of users')))

@section('section')
@section ('stable_panel_body')
    @include('widgets.datatable.table', array('class'=>'table-striped'))
@endsection
    <div class="col-sm-12">
        <a class="btn btn-primary pull-right" title="Create a new user" href="{{ route('users.create') }}">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    </div>
    <p>&nbsp;</p>
    <div class="col-sm-12">
        @yield ('stable_panel_body')
    </div>
@stop