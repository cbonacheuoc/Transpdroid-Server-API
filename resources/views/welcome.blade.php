@extends('layouts.app')

@section('content')

<style>
    .sec-titulo {
        width: 100% !important;
        clear: both;
        display: inline-block;
        border-image: linear-gradient(0deg, transparent, #707070 0%, transparent) 1 0 100%;
        -webkit-border-image: -webkit-linear-gradient(0deg, transparent, #707070 0%, transparent) 1 0 100%;
        -o-border-image: -o-linear-gradient(0deg, transparent, #707070 0%, transparent) 1 0 100%;
        -moz-border-image: -moz-linear-gradient(0deg, transparent, #707070 0%, transparent) 1 0 100%;
        border-image-width: 0 0 2px 0;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center; padding-bottom: 20px;">
                <img style="width: 40%" src="{{ asset('img/logo.png') }}" alt="{{ ucfirst(Lang::get('app.logo')) }}" title="{{ ucfirst(Lang::get('app.logo')) }}">
            </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-content-header-top clearfix sec-titulo">
                <h2 class="section--title-adapted">{{ ucfirst(Lang::get('app.shipment Locator')) }}</h2>	
            </div>			
            <p class="section--description">{{ ucfirst(Lang::get('app.check the detailed states of your shipment by entering your shipping code.')) }}</p>
            <div class="col-md-12" style="padding-bottom: 20px;">
                <img style="width: 100%" src="{{ asset('img/front_Image.png') }}" alt="{{ ucfirst(Lang::get('app.shipment Locator')) }}" title="{{ ucfirst(Lang::get('app.shipment Locator')) }}">
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">{{ ucfirst(Lang::get('app.shipping code')) }}</label>

                    <div class="col-md-8">
                        <input placeholder="{{  ucfirst(Lang::get('app.enter your shipping code')) }}" id="code" type="code" class="form-control" name="code" value="{{ old('code') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button id="check" type="submit" class="btn btn-primary">
                            {{ ucfirst(Lang::get('app.locate shipping')) }}
                        </button>
                    </div>
                </div>
                <div id="shipping-history">
                </div>
            </div>
        </div>
    </div>
    <script>

        $("#check").click(function () {
            $.ajax({
                url: '{{route('shippings.get.states')}}',
                data: {
                    code: $('[name="code"]').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                dataType: 'json',
                success: function (json) {
                    $('#shipping-history').html(json.data.html);
                },
            });
        });
    </script>
    @endsection
