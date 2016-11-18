@extends('layouts.main')

@section('head')
    <meta http-equiv="refresh" content="10">
@endsection


@section('content')
    <div class="container">
        <em>{{ $time }}</em>
        <strong>Currency Rate: </strong> {{ $rate or "Sorry. No Currency Rate resourse available."}}
    </div>
@endsection
