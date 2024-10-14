@extends('base.index')

@section('content')
<div class="flex justify-center items-center mt-6 mx-auto px-4">
    <h1 class="text-3xl font-bold">Event Category</h1>
    <a href="{{route('categories.create')}}" class="btn btn-primary ms-2 font-semibold"> + Create </a>
</div>

<div class="container mt-6 px-4 mx-auto ">
    <div class="overflow-x-auto ">
        <table class="table bg-neutral text-white ">
          <!-- head -->
          <thead class="text-lg text-white">
            <tr>
              <th></th>
              <th>Event Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categoryData as $eventCategory)
            <tr>
                <td>{{ $eventCategory->id }}</td>
                <td>{{ $eventCategory->name }}</td>
                <td> <a href="{{route('categories.edit', $eventCategory->id)}}" class="btn btn-warning">Edit</a> 
                    <form action="{{route('categories.destroy', $eventCategory->id)}}" method="POST"  onsubmit="return confirm('Are you sure you want to delete?');" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach   
          </tbody>
        </table>
      </div>
</div>
    
@endsection