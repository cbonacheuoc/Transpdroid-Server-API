@extends('layouts.dashboard')
@section('page_heading','Add a user')

@section('section')
<div class="col-sm-12">
    {!! Form::open(['route' => ['users.store'], 'autocomplete' => 'off', 'method' => 'post','id'=>'frmUserCreate','files'=>true]) !!}
        <div class="row">
            @include('user-module.forms.form', array('header'=>true, 'as'=>'stable'))
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info">Save</button>
            <button type="reset" class="btn btn-default">Cancel</button>
        </div>
    {!! Form::close() !!}
</div>
</div>
@stop