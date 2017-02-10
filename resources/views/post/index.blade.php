@extends('layouts.app')
@section('content')
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 no-padding">
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10 no-padding">
     <h1>All Posts</h1>
  </div>
  <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
     <a class="btn btn-primary btn-block" href="{{route('posts.create')}}" style="margin-top: 20px;">Create New Post</a>
  </div>
</div>
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 no-padding">
 <table class="table">
    <thead>
         <tr>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created At</th>
          <th></th>
         </tr>
    </thead>
    <tbody>
         @foreach($posts as $post)
           <tr>
             <td>{{$post->id}}</td>
             <td style="max-width: 150px;">{{$post->title}}</td>
              <td style="max-width: 400px;">{{$post->body}}</td>
              <td>{{$post->created_at->format('M d, Y') }}</td>
              <td>
               <a href="{{ url('posts/'.$post->id)}}" class="btn btn-default">View</a>
               <a href="{{ url('posts/'.$post->id.'/edit')}}" class="btn btn-default">Edit</a>
              </td>
           </tr>
         @endforeach
    </tbody>
  </table>
  <center>
  {{ $posts->links() }}
  </center>
</div>

@endsection