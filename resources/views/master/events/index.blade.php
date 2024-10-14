@extends('base.index')

@section('content')
<div class="flex justify-center items-center mt-6 mx-auto px-4">
    <h1 class="text-3xl font-bold">Event Master</h1>
    <a href="{{route('events.create')}}" class="btn btn-primary ms-2 font-semibold"> + Create </a>
</div>

<div class="container mt-6 px-4 mx-auto">
    <div class="overflow-x-auto ">
        <table class="table bg-neutral text-white">
          <!-- head -->
          <thead class="text-lg text-white">
            <tr>
              <th></th>
              <th>Event Name</th>
              <th>Date</th>
              <th>Location</th>
              <th>Organizer</th>
              <th>About</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($eventData as $eventCategory)
            <tr>
                <td>{{ $eventCategory->id }}</td>
                <td>{{ $eventCategory->title }}</td>
                <td>{{ $eventCategory->tanggal->format('D, M d Y')}} - {{$eventCategory->start_time->format('h:i A')}}</td>
                <td>{{ $eventCategory->venue }}</td>
                <td>{{ $eventCategory->organizer->name }}</td>
                <td>{{ $eventCategory->description }}</td>
                <td> <a href="{{route('events.edit', $eventCategory->id)}}" class="btn btn-warning">Edit</a> 
                  
                  <form action="{{route('events.destroy', $eventCategory->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');" class="mt-2">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-error">Delete</button>
                  </form> 
                
                </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
</div>
    
@endsection