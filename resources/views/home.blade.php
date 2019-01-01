@extends('layouts.app')

@section('content')
	<messenger :user-id="{{ auth()->id() }}"/>
@endsection