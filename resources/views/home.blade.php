@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h1>Welcome to My Blogs!</h1>
  <p>Thank you so much for visiting. This is test website built with Laravel. Please read my popular post!</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
 <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
   @foreach($posts as $post)
      @include('widgets.post',array('post'=>$post))
   @endforeach
 </div>
 <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 no-padding">
    <h3>SideBar</h3>
 </div>
</div>
@endsection