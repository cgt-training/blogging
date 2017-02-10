@extends('layouts.app')
@section('content')

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
       <h3 class="bold">
         {{$post->title}}
       </h3>
       <p>Created:  {{$post->created_at->format('M d, Y')}}</p>
       <p>{{$post->body}}</p>
</div>

@endsection
