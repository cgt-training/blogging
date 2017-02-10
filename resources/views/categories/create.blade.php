<div style="margin-top: 25px;" class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Add New</h3>
      </div>
      <div class="panel-body">
        @include('partials._errors')
        {!! Form::open(['route' => 'categories.store','id'=>'add-cat-form','data-parsley-validate'=>'']) !!}

         <div class="form-group">
          {!! Form::label('name','Name') !!}
          {!! Form::text('name',null,
                   [
                     'class'=>'form-control',
                     'data-parsley-required'=>'',
                     'data-parsley-minlength'=>'5',
                     'data-parsley-maxlength'=>'50',
                     'data-parsley-pattern'=>'^[a-zA-Z0-9\\-\\s]+$',
                     'data-parsley-pattern-message'=>'Name must be alphanumeric and whitespace'
                   ]) !!}
        </div>
        <div class="form-group">
  
         {!! Form::submit('Add',['class'=>'btn btn-primary pull-right']) !!}
    
        </div>
        
        {!! Form::close() !!}
      </div>
    </div>

    <script type="text/javascript">
$(function () {
  $('#add-cat-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>