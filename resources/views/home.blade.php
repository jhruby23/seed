@extends('layouts.app', ['pageTitle' => 'Dashboard'])

@section('content')
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
	         	<div class="panel-heading">Dashboard</div>
	         	<div class="panel-body">
						<p>Hi, {{ Auth::user()->name }}!</p>
	         	</div>
				</div>
			</div>
		</div>
@endsection
