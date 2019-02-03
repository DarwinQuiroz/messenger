@extends('layouts.app')

@section('content')
	{{-- <messenger :user="{{ auth()->user() }}"/> --}}

	<router-view :user="{{ auth()->user() }}"/>
@endsection