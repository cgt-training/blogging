@extends('layouts.app')
@section('content')

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
    @if(Session::has('message'))
       <p class="alert alert-warning">{{ Session::get('message') }}</p>
    @endif
    <h1>Tags List</h1>
    <table class="table table-responsive">
      <thead>
       <tr>
         <th>#</th>
         <th>Name</th>
         <th></th>
       </tr>
      </thead>
      <tbody>
        @foreach($tags as $tag)
           <tr>
              <td>{{$tag->id}}</td>
              <td>{{$tag->name}}</td>
              <td>
                <a style="margin-right:10px;" class="btn btn-success pull-left" href="{{ route('tags.index',['id'=>$tag->id])}}">
                  Edit
                </a>
                 <form action="{{ url('tags/'.$tag->id) }}" onsubmit="return confirm('Are you sure?');" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
         <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>
              </td>
           </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
  
     @if($tg->id >0)
      @include('tags.edit',array('tag'=>$tg))
     @else
       @include('tags.create')
     @endif
  </div>
</div>

@endsection