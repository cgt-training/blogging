@extends('layouts.app')
@section('content')
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
<h2 class="bold">Contact Me</h2>
<form method="Post">
 {{ csrf_field() }}
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label >Subject</label>
    <input type="password" class="form-control" id="subject" placeholder="Subject">
  </div>
  <div class="form-group">
    <label >Message</label>
    <textarea class="form-control" rows="5" id="message"></textarea> 
  </div>
 
  <button type="submit" class="btn btn-success">Send Message</button>
</form>


</div>
@endsection