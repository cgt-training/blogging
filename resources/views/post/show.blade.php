@extends('layouts.app')
@section('content')

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 no-padding">
 
  <h1>Show Post <span  class="bold">{{ $post->title}}</span></h1>
  <p>
   {{$post->body}}
  </p>
 </div>
 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 no-padding">
 <div class="alert alert-warning col-md-12 col-lg-12 col-xs-12 col-sm-12">
   <div style="margin-bottom: 15px;" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding"> 
    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 bold" style="text-align: right;">Url: </div>
    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 bold no-padding">
      <a href="{{Request::url()}}">{{Request::url()}}</a>
    </div>
   </div>
   <div style="margin-bottom: 15px;" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 bold" style="text-align: right;">Created At:</div>
    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 bold no-padding">
    {{$post->created_at->format('M d,Y h:i') }}
    </div>
   </div>
   <div  style="margin-bottom: 15px;" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 bold" style="text-align: right;">updated At:</div>
    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 bold no-padding">
    {{$post->updated_at->format('M d,Y h:i')}}
    </div>
   </div>
   <div style="margin-top: 20px;" class="col-md-12 col-lg-12 col-xs-12 col-sm-12 no-padding"> 
     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left:0px;"> 
         <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-primary btn-block">Edit</a>
     </div>
     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left:0px;padding-right: 0px;"> 
         <form action="{{ url('posts/'.$post->id) }}" onsubmit="return confirm('Are you sure?');" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
         <button type="submit" class="btn btn-danger btn-block">
                Delete
            </button>
        </form>
     </div>
   </div>
   <div style="margin-top: 20px;" class="col-md-12 col-lg-12 col-xs-12 col-sm-12 no-padding"> 
    <a href="{{URL::previous()}}" class="btn btn-default btn-block"><< See all posts</a>
   </div>
 </div>
 </div>

</div>

@endsection