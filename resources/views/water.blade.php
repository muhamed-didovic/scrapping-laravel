@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            WATER
        </div>
        <p>Successfully scraped {{ count($crawler) }} pages, and {{$counter}} are ONLINE</p>
    </div>
@endsection
