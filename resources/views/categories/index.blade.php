@extends('layouts.app')
@section('content')

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
    @if(Session::has('message'))
       <p class="alert alert-warning">{{ Session::get('message') }}</p>
    @endif
    <h1>Categories List</h1>
    <table class="table table-responsive">
      <thead>
       <tr>
         <th>#</th>
         <th>Name</th>
         <th></th>
       </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
           <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td>
                <a style="margin-right:10px;" class="btn btn-success pull-left" href="{{ route('categories.index',['id'=>$category->id])}}">
                  Edit
                </a>
                 <form action="{{ url('categories/'.$category->id) }}" onsubmit="return confirm('Are you sure?');" method="POST">
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
  
     @if($cat->id >0)
      @include('categories.edit',array('category'=>$cat))
     @else
       @include('categories.create')
     @endif
  </div>
</div>

@endsection