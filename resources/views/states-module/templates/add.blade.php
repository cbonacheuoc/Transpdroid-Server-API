@extends('layouts.dashboard')
@section('page_heading', ucfirst(Lang::get('app.add a states')))

@section('section')
<div class="col-sm-12">
    {!! Form::open(['route' => ['states.store'], 'autocomplete' => 'off', 'method' => 'post','id'=>'frmStatesCreate','files'=>true]) !!}
        <div class="row">
            @include('states-module.forms.form', array('header'=>true, 'as'=>'stable'))
        </div>
        <div class="text-right">
            <a class="btn btn-danger" title="{{ ucfirst(Lang::get('app.cancel')) }}" href="{{route('shippings.index')}}">{{ ucfirst(Lang::get('app.cancel')) }}</a>
            <button type="submit" class="btn btn-info">{!! ucfirst(Lang::get('app.save')) !!}</button>
        </div>
    {!! Form::close() !!}
</div>
</div>
@stop