@extends('layouts.app')

@section('content')

    
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                     @include('partials._errors')
                    {!! Form::open(['route' => 'register','id'=>'login-form','data-parsley-validate'=>'','class'=>'form-horizontal']) !!} 
                      

                        <div class="form-group">
                            {!! Form::label('name','Name',['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('name',null,
                                  [
                                    'class'=>'form-control',
                                    'data-parsley-required'=>'',
                                     'data-parsley-maxlength'=>'100',
                                     'data-parsley-minlength'=>'5',
                                  ]) !!}

                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                             {!! Form::label('password','Password',['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                 
                                {!! Form::password('password',
                                  [
                                    'class'=>'form-control',
                                    'id'=>'password',
                                    'data-parsley-required'=>'',
                                    'data-parsley-minlength'=>'6'
                                     
                                  ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirm','Confirm Password',['class'=>'col-md-4 control-label']) !!}


                            <div class="col-md-6">
                                 
                                {!! Form::password('password_confirmation',
                                  [
                                    'class'=>'form-control',
                                    'data-parsley-required'=>'',
                                    'data-parsley-equalto'=>'#password',
                                    'data-parsley-equalto-message'=>'Confirm password and password must be same'
                                  ]) !!}
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Register',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::Close() !!}
                </div>
            </div>
        </div>

@endsection
