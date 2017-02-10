@extends('layouts.app')
@section('content')
<h1 style="border-bottom: 1px solid #EEE;padding-bottom: 10px;">Blogs</h1>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
  @foreach($posts as $post)
     @include('widgets.post',array('post'=>$post))
  @endforeach
</div>
<center>
   {{ $posts->links() }}
</center>

@endsection
