<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"> {!! Form::label('client', ucfirst(Lang::get('app.user'))) !!}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('email', ucfirst(Lang::get('app.email'))) !!}
                    <span class="required">*</span>
                    @if ($edit)
                        {!! Form::text('email', $value = $user->email , $attributes = ['class' => 'form-control disabled', 'readonly' => "" ]) !!}
                    @else
                        {!! Form::text('email', $value = $user->email , $attributes = ['class' => 'form-control' => "" ]) !!}
                    @endif
                    <span class="help-block">{!! ucfirst(Lang::get('app.this is the name used on the login screen')) !!}</span>
                </div>
                <div class="form-group ">
                    {!! Form::label('name', ucfirst(Lang::get('app.name'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('name', $value = $user->name , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('password', ucfirst(Lang::get('app.password'))) !!}
                    <span class="required">*</span>
                    @if ($edit)
                        {!! Form::password('password', $value = $user->password , $attributes = ['class' => 'form-control disabled', 'readonly' => "" ]) !!}
                    @else
                        {!! Form::password('password', $value = $user->password , $attributes = ['class' => 'form-control' => "" ]) !!}
                    @endif
                    <span class="help-block">{!! ucfirst(Lang::get('app.this is the name used on the login screen')) !!}</span>
                </div>
                <div class="form-group ">
                    {!! Form::label('type', ucfirst(Lang::get('app.type'))) !!}
                    <span class="required">*</span>
                    {!! Form::select('type', type, $user->type, ['class' => 'form-control select2','placeholder' => ucfirst(Lang::get('app.select a type...'))]) !!}
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