<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"> {!! Form::label('client', ucfirst(Lang::get('app.user'))) !!}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('login', 'Login name') !!}
                    <span class="required">*</span>
                    {!! Form::text('login', $value = $user->email , $attributes = ['class' => 'form-control disabled', 'readonly' => "" ]) !!}
                    <span class="help-block">{!! ucfirst(Lang::get('app.this is the name used on the login screen')) !!}</span>
                </div>
                <div class="form-group ">
                    {!! Form::label('login', 'First Name') !!}
                    <span class="required">*</span>
                    {!! Form::text('firstname', $value = $user->firstname , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('email', ucfirst(Lang::get('app.email'))) !!}
                    <span class="required">*</span>
                    {!! Form::email('email', $value = $user->login , $attributes = ['class' => 'form-control']) !!}
                    <span class="help-block">{!! ucfirst(Lang::get('app.please enter a valid email address')) !!}</span>
                </div>
                <div class="form-group ">
                    {!! Form::label('lastname', ucfirst(Lang::get('app.lastname'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('lastname', $value = $user->lastname , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="{{ asset("js/validateForms.js") }}" type="text/javascript"></script>-->
<script type="text/javascript">

//$("form").validate();

</script>