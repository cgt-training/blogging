@extends('layouts.app')
@section('content')

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<h1>Edit New Post</h1>
@include('partials._errors')

 {!! Form::model($post,['url' => 'posts/'.$post->id,'method'=>'PUT']) !!}
  <div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('slug','Slug') !!}
    {!! Form::text('slug',null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
   {!! Form::label('category_id','Category') !!}
   <select class="form-control" name='category_id' id='category_id' data-parsley-required=''>
      <option value={{null}} >Select</option>
      @foreach($categories as $category)
        @if($category->id == $post->category_id)
         <option value='{{$category->id}}' selected>{{ $category->name }}</option>
        @else
          <option value='{{$category->id}}'>{{ $category->name }}</option> 
        @endif
      @endforeach
   </select>

  </div>
  <div class="form-group">
     {!! Form::label('tags','Tags') !!}
     {!! Form::select('tags[]',$tags,array_pluck($post->tags,'id'),['multiple','class'=>'form-control  js-example-basic-multiple']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
  <a class="pull-right btn btn-default" style="margin-left:5px;" href="{{ route('posts.index') }}">Back</a>
    {!! Form::submit('Update Post',['class'=>'btn btn-primary pull-right']) !!}
    
  </div>

 {!! Form::close() !!}
</div>

@endsection

