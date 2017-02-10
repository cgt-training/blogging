@extends('layouts.app')

@section('content')

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    @include('partials._errors')
                    
                     {!! Form::open(['route' => 'login','id'=>'login-form','data-parsley-validate'=>'','class'=>'form-horizontal']) !!}  

                        <div class="form-group">
                            
                            {!! Form::label('email','E-mail Address',['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email',null,
                                  [
                                    'class'=>'form-control',
                                    'data-parsley-required'=>'',
                                     'data-parsley-email'=>'',
                                  ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password','Password',['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                
                                {!! Form::password('password',
                                  [
                                    'class'=>'form-control',
                                    'data-parsley-required'=>''
                                     
                                  ]) !!}
                            

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                 {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}

                                
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@endsection
