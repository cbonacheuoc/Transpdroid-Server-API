@extends('layouts.dashboard')
@section('page_heading','Editing a states')

@section('section')
<div class="col-sm-12">
    {!! Form::open(['route' => ['states.update',$states->id], 'autocomplete' => 'off', 'method' => 'post','id'=>'frmStatesUpdate','files'=>true]) !!}
    {{ method_field('PUT') }}
        <div class="row">
            @include('states-module.forms.form', array('header'=>true, 'as'=>'stable'))
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info">{!! ucfirst(Lang::get('app.save')) !!}</button>
            <button type="reset" class="btn btn-default">{!! ucfirst(Lang::get('app.cancel')) !!}</button>
        </div>
    {!! Form::close() !!}
</div>
</div>
@stop