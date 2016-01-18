@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
         	<div class="panel-heading">My profile</div>
         	<div class="panel-body">
            	{!! Form::open(['method' => 'PATCH', 'route' => ['users.update', Auth::user()->id], 'class' => 'form-horizontal']) !!}    
            	
            		<div class="form-group">
            			{!! Form::label('name', 'Username', ['class' => 'col-md-4 control-label']) !!}
            			<div class="col-md-6">
							{!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
            			</div>
            		</div>   
            	
            		<div class="form-group">
            			{!! Form::label('first_name', 'First name', ['class' => 'col-md-4 control-label']) !!}
            			<div class="col-md-6">
							{!! Form::text('first_name', Auth::user()->first_name, ['class' => 'form-control']) !!}
            			</div>
            		</div>   
            	
            		<div class="form-group">
            			{!! Form::label('last_name', 'Last name', ['class' => 'col-md-4 control-label']) !!}
            			<div class="col-md-6">
							{!! Form::text('last_name', Auth::user()->last_name, ['class' => 'form-control']) !!}
            			</div>
            		</div>   
            	
            		<div class="form-group">
            			{!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
            			<div class="col-md-6">
							{!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
            			</div>
            		</div>   
            	
            		<div class="form-group">
            			{!! Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']) !!}
            			<div class="col-md-6">
							{!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
            			</div>
            		</div>
            		
            		<div class="form-group">
            			<div class="col-md-6 col-md-offset-4">
            			{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            			</div>
            		</div>
            	
            	{!! Form::close() !!}    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
