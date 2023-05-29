@extends('layouts.admin')

@section('title')
    العروض
@endsection

@section('contentheader')
    العروض
@endsection

@section('contentheaderactive')
    العروض
@endsection

@section('content')
    {{--   content--}}
    <img src="{{ route('image.show', ['filename' => 'Screenshot.png']) }}" alt="Example Image">
@endsection


