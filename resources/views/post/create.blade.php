@extends('layouts.app')
@section('content')

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<h1>Create New Post</h1>

  @include('partials._errors')

 {!! Form::open(['route' => 'posts.store','id'=>'create-post-form','data-parsley-validate'=>'']) !!}
  <div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',null,
                   [
                     'class'=>'form-control',
                     'data-parsley-required'=>'',
                     'data-parsley-minlength'=>'5',
                     'data-parsley-maxlength'=>'100',
                     'data-parsley-pattern'=>'^[a-zA-Z0-9\\-\\s]+$',
                     'data-parsley-pattern-message'=>'Title must be alphanumeric and whitespace'
                   ]) !!}
  </div>
  <div class="form-group">
    {!! Form::label('slug','Slug') !!}
    {!! Form::text('slug',null,
                    [
                      'class'=>'form-control',
                      'data-parsley-required'=>'',
                      'data-parsley-minlength'=>'5',
                      'data-parsley-maxlength'=>'110',
                      'data-parsley-pattern'=>'^[A-Za-z0-9_][A-Za-z0-9_-]*$',
                      'data-parsley-pattern-message'=>'Slug must contain only alphanumeric value with - or _'
                    ]) !!}
  </div>
  <div class="form-group">
   {!! Form::label('category_id','Category') !!}
   <select class="form-control" name='category_id' id='category_id' data-parsley-required=''>
      <option value={{null}} >Select</option>
      @foreach($categories as $category)
        <option value='{{$category->id}}'>{{ $category->name }}</option>
      @endforeach
   </select>
  </div>
  <div class="form-group">
  <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
     @foreach($tags as $tag)
       <option value="{{$tag->id}}">{{$tag->name}}</option>
     @endforeach
  </select>
  </div>
  <div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',null,
       [ 
          'class'=>'form-control',
          'data-parsley-required'=>'', 
          'data-parsley-minlength'=>'20',
          'data-parsley-maxlength'=>'300'
       ]) !!}
  </div>
  <div class="form-group">
  <a class="pull-right btn btn-default" style="margin-left:5px;" href="{{ route('posts.index') }}">Back</a>
    {!! Form::submit('Create Post',['class'=>'btn btn-primary pull-right']) !!}
    
  </div>

 {!! Form::close() !!}
</div>

<script type="text/javascript">

$(function () {
  $('#create-post-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>

@endsection

