@extends('layouts.dashboard')
@section('page_heading', ucfirst(Lang::get('app.add a shipping')))

@section('section')
<div class="col-sm-12">
    {!! Form::open(['route' => ['shippings.store'], 'autocomplete' => 'off', 'method' => 'post','id'=>'frmShippingCreate','files'=>true]) !!}
        <div class="row">
            @include('shipping-module.forms.form', array('header'=>true, 'as'=>'stable'))
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info">{!! ucfirst(Lang::get('app.save')) !!}</button>
            <button type="reset" class="btn btn-default">{!! ucfirst(Lang::get('app.cancel')) !!}</button>
        </div>
    {!! Form::close() !!}
</div>
</div>
@stop