@extends('base.index')

@section('content')

<div class="flex justify-center items-center mt-6 mx-auto px-4">
    <h1 class="text-3xl font-bold">Organizer</h1>
    <a href="{{route('organizer.create')}}" class="btn btn-primary ms-2 font-semibold"> + Create </a>
</div>

<div class="container mt-6 px-4 mx-auto">
    <div class="overflow-x-auto">
        <table class="table bg-neutral text-white">
          <!-- head -->
          <thead class="text-lg text-white">
            <tr>
              <th></th>
              <th>Event Category Name</th>
              <th>About</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($organizerData as $eventCategory)
            <tr>
                <td>{{ $eventCategory->id }}</td>
                <td>{{ $eventCategory->name }}</td>
                <td>{{ $eventCategory->description }}</td>
                <td> <a href="{{route('organizer.edit', $eventCategory->id)}}" class="btn btn-warning">Edit</a> 
                  
                  <form action="{{route('organizer.destroy', $eventCategory->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-error" >Delete</button>
                  </form>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
</div>
    
@endsection