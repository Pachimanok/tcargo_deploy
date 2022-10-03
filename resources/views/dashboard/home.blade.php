@extends('layouts.app')

@section('content')
	
	<br><br><h3>Welcome, {{ Auth::user()->name }}.</h3>
	<br><h4>Your dashboard will be here pretty soon.</h4>
@endsection
