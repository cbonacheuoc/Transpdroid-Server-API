<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"> {!! Form::label('client', ucfirst(Lang::get('app.states'))) !!}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('code', ucfirst(Lang::get('app.code'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('code', $value = $states->code , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    {!! Form::label('name', ucfirst(Lang::get('app.name'))) !!}
                    <span class="required">*</span>
                    {!! Form::text('name', $value = $states->name , $attributes = ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group ">
                    {!! Form::label('description', ucfirst(Lang::get('app.description'))) !!}
                    <span class="required">*</span>
                    {!! Form::textarea('description', $value = $states->description , $attributes = ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="{{ asset("js/validateForms.js") }}" type="text/javascript"></script>-->
<script type="text/javascript">

//$("form").validate();

</script>