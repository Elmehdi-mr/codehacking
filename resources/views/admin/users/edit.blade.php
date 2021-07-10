@extends('layouts.admin')


@section('content')

<h1>Edit Users</h1>

<div class="row">

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">

                {!! Form::model($user,['method' => 'PATCH','action'=>['AdminUserController@update', $user->id ],'enctype'=>'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('name' ,'Name:') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email' ,'Email:') !!}
                    {!! Form::email('email',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role_id' ,'Role:') !!}
                    {!! Form::select('role_id',[''=>'Choose Options'] + $roles,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active' ,'Status:') !!}
                    {!! Form::select('is_active',array(0 => 'Not Active', 1 => 'Active' ),null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group"> 
                    {!! Form::label('photo_id' ,'Photo:') !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password' ,'Password:') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update User',['class'=>'btn btn-warning col-xs-3 pull-left']) !!}
                </div>


                {!! Form::close() !!}


                {!! Form::open(['method' => 'DELETE','action'=>['AdminUserController@destroy', $user->id ]]) !!}
               
                <div class="form-group">
                    {!! Form::submit('Delete User',['class'=>'btn btn-danger col-xs-3 pull-right']) !!}
                </div>
                
                {!! Form::close() !!}
        </div>
</div>

<div class="row">

    @include('includes.form-error')

</div>
@endsection