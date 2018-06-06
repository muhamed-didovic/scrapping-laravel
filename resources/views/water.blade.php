@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            WATER
        </div>
        <p>Trying to scrape {{ count($crawler ?? []) }} pages, and {{$counter ?? 0}} are ONLINE</p>
    </div>
@endsection
