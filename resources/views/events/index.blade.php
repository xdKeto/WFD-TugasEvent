@extends('base.index')

@section('content')
<div class="container mt-6 px-4 mx-auto text-3xl font-bold">
    Events in Surabaya
</div>

<div class="container mt-4 px-4 mx-auto">
    <div class="grid grid-cols-3 gap-4">
        @foreach($events as $event)
        <div class="card card-compact bg-base-100 w-96 shadow-white shadow-lg mt-2">
            <figure>
              <img
                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                alt="default" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">{{$event->title}}</h2>
              <p class="font-bold">{{$event->tanggal->format('D, M d Y')}} - {{$event->start_time->format('h:i A')}}</p>
              <p>{{$event->venue}}</p>
              <p>Free</p>
              <p>Organizer {{$event->organizer->name}}</p>
              {{-- <p>Organizer {{$event->categories->name}}</p> --}}
              <div class="card-actions justify-end">
                <a href="{{route('events.show', $event->id)}}" class="btn btn-primary">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>
    
@endsection