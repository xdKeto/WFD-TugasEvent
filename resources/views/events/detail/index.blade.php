@extends('base.index')

@section('content')
<div class="flex px-4 mt-4 justify-end">
    <a href="{{route('events/index')}}" class="btn btn-primary text-md px-6">Back</a>
</div>
<div class="container px-4">
    <h3 class="text-md font-semibold"> {{$event->categories->name}} </h3>
    <h1 class="text-4xl font-bold mt-2">{{$event->title}}</h1>
</div>

<img src="{{asset('assets/default-image.jpg')}}" alt="" class="mt-6 px-4 max-w-screen-md">
<div class="grid grid-cols-2 px-4 mt-4">
    <div class="flex flex-col justify-center mt-6">
        <h2 class="text-xl font-bold">Organizer</h2>
        <p class="text-md">{{$event->organizer->name}}</p>
    </div>
    <div class="flex flex-col justify-center mt-6">
        <h2 class="text-xl font-bold">Date and Time</h2>
        <p class="text-md">{{$event->tanggal->format('D, M d Y')}} - {{$event->start_time->format('h:i A')}}</p>
    </div>
    <div class="flex flex-col justify-center mt-6">
        <h2 class="text-xl font-bold">Booking URL</h2>
        <p class="text-md">{{$event->booking_url}}</p>
    </div>
    <div class="flex flex-col justify-center mt-6">
        <h2 class="text-xl font-bold">Location</h2>
        <p class="text-md">{{$event->venue}}</p>
    </div>
    <div class="flex flex-col justify-center mt-6">
        <h2 class="text-xl font-bold">About this Event</h2>
        <p class="text-md">{{$event->description}}</p>
    </div>
</div>

<div class="grid grid-rows-1 mt-6 px-4">
    <h1 class="text-xl font-bold">Tags</h1>
    <div>
         @foreach(json_decode($event->tags) as $tag)
            <div class="badge badge-primary">{{$tag->value}}</div>
        @endforeach
    </div>
</div>

@endsection