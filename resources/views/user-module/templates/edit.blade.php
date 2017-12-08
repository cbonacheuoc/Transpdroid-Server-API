@extends('layouts.dashboard')
@section('page_heading','Editing a user')

@section('section')
<div class="col-sm-12">
    {!! Form::open(['route' => ['users.update',$user->id], 'autocomplete' => 'off', 'method' => 'post','id'=>'frmUserUpdate','files'=>true]) !!}
    {{ method_field('PUT') }}
        <div class="row">
            @include('user-module.forms.form', array('header'=>true, 'as'=>'stable'))
        </div>
        <div class="text-right">
            <a class="btn btn-danger" title="{{ ucfirst(Lang::get('app.cancel')) }}" href="{{route('shippings.index')}}">{{ ucfirst(Lang::get('app.cancel')) }}</a>
            <button type="submit" class="btn btn-info">{!! ucfirst(Lang::get('app.save')) !!}</button>
        </div>
    {!! Form::close() !!}
</div>
</div>
@stop