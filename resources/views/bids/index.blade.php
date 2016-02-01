@extends('layouts.app', ['pageTitle' => 'My bids'])

@section('content')
	<h2>Active</h2>
	
	<h3>I am selling</h3>
	<ul>
		@foreach($bidsActive as $ba)
		<li><a href="{{ route('bids.show', $ba['id']) }}">{{ $ba['sold']['name'] }}</a></li>
		@endforeach
	</ul>
	
	<h3>I am buying</h3>
	<ul>
		@foreach($offersActive as $oa)
		<li><a href="{{ route('bids.show', $oa['id']) }}">{{ $oa['bought']['name'] }}</a></li>
		@endforeach
	</ul>
	
	<h2>Completed</h2>
	
	<h3>I sold</h3>
	<ul>
		@foreach($bidsCompleted as $bc)
		<li><a href="{{ route('bids.show', $bc['id']) }}">{{ $bc['sold']['name'] }} -> {{ $bc['bought']['name'] }}</a></li>
		@endforeach
	</ul>
	
	<h3>I bought</h3>
	<ul>
		@foreach($offersCompleted as $oc)
		<li><a href="{{ route('bids.show', $oc['id']) }}">{{ $oc['bought']['name'] }} -> {{ $oc['sold']['name'] }}</a></li>
		@endforeach
	</ul>
@endsection
