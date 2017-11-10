<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"> {!! Form::label('client', ucfirst(Lang::get('app.shipping'))) !!}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('code', ucfirst(Lang::get('app.shipping code'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('code', $value = $shipping->code , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('weight', ucfirst(Lang::get('app.weight'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('weight', $value = $shipping->weight , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('states', ucfirst(Lang::get('app.states'))) !!}
                    <span class="required">*</span>
                    @if ($edit) 
                        {!! Form::select('states', $states, $shipping->states, ['class' => 'form-control select2','placeholder' => ucfirst(Lang::get('app.select a states...'))]) !!}
                    @else
                        {!! Form::select('states', $states, $shipping->states, ['class' => 'form-control select2','readonly' => 'readonly','placeholder' => ucfirst(Lang::get('app.select a states...'))]) !!}
                    @endif
                </div>
                <div class="form-group ">
                    {!! Form::label('delivery_date', ucfirst(Lang::get('app.delivery_date'))) !!}
                    <span class="required">*</span>
                    {!! Form::date('delivery_date', \Carbon\Carbon::now()) !!}
                    @if ($edit) 
                    @else
                    @endif
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('number', ucfirst(Lang::get('app.number'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('number', $value = $shipping->number , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('size', ucfirst(Lang::get('app.size'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('size', $value = $shipping->size , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('user_id', ucfirst(Lang::get('app.user_id'))) !!}
                    @if ($edit) 
                        {!! Form::select('user_id', $users, $shipping->user_id, ['class' => 'form-control','placeholder' => ucfirst(Lang::get('app.select a delivery man...'))]) !!}
                    @else
                        {!! Form::select('user_id', $users, $shipping->user_id, ['class' => 'form-control','readonly' => 'readonly','placeholder' => ucfirst(Lang::get('app.select a delivery man...'))]) !!}
                    @endif
                </div>
                <div class="form-group ">
                    {!! Form::label('fragile', ucfirst(Lang::get('app.fragile'))) !!}
                    <span class="required">*</span>
                    {!! Form::checkbox('fragile', $value = $shipping->fragile , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"> {!! Form::label('client', ucfirst(Lang::get('app.personal data'))) !!}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('contact_person', ucfirst(Lang::get('app.contact person'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('contact_person', $value = $shipping->contact_person , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('email', ucfirst(Lang::get('app.email'))) !!}
                    <span class="required">*</span>
                    {!! Form::email('email', $value = $shipping->email , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('address', ucfirst(Lang::get('app.address'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('address', $value = $shipping->address , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('city', ucfirst(Lang::get('app.city'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('city', $value = $shipping->city , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('telephone', ucfirst(Lang::get('app.telephone'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('telephone', $value = $shipping->telephone , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('cp', ucfirst(Lang::get('app.cp'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('cp', $value = $shipping->cp , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('state', ucfirst(Lang::get('app.state'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('state', $value = $shipping->state , $attributes = ['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('country', ucfirst(Lang::get('app.country'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('country', $value = $shipping->country , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="{{ asset("js/validateForms.js") }}" type="text/javascript"></script>-->
<script type="text/javascript">

//$("form").validate();

</script>