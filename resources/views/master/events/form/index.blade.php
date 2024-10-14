@extends('base.index')

@section('content')
  <div class="flex justify-center items-center mt-6 mx-auto px-4">
    <h1 class="text-3xl font-bold">Create Event</h1>
  </div>



  <div class="container justify-center items-center mt-4 mx-auto px-4">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (isset($eventData))
    <form id="form" action="{{ route('events.update', $eventData->id) }}" method="POST">
        @csrf
        @method('put')
        <label class="form-control w-full max-w-xs">
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Title</span>
          </div>
          <input required type="text" name="title" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" value="{{$eventData->title}}"/>
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Location</span>
          </div>
          <input required type="text" name="venue" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" value="{{$eventData->venue}}"/>
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Tanggal</span>
          </div>
          <input required type="date" name="tanggal" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" value="{{ \Carbon\Carbon::parse($eventData->tanggal)->format('Y-m-d') }}"/>
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Time</span>
          </div>
          <input required type="time" name="start_time" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" value="{{ \Carbon\Carbon::parse($eventData->start_time)->format('h:i') }}"/>
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Booking URL</span>
          </div>
          <input required type="text" name="booking_url" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" value="{{$eventData->booking_url}}"/>
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Description</span>
          </div>
          <input required type="text" name="description" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" value="{{$eventData->description}}"/>
  
          <div class="mb-2 mt-2">
            <p>Event Category:</p>
            <select required name="event_category" class="select select-bordered w-full max-w-xs">
              <option value="" disabled>Select Event Category</option>
              @foreach ($categoryData as $category)
                <option value="{{$category->id}}" {{ $eventData->categories_id == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>
  
          <div class="mb-2 mt-2">
            <p>Organizer:</p>
            <select required name="organizer" class="select select-bordered w-full max-w-xs">
              <option value="" disabled selected>Select Organizer</option>
              @foreach ($organizerData as $organizer)
                <option value="{{ $organizer->id }}" {{ $eventData->organizer_id == $organizer->id ? 'selected' : '' }}>{{ $organizer->name }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="mb-2 mt-2">
            <label for="exampletags" class="inline-block mb-2">Tags</label>
            <input required type="text" name="tags" placeholder="input tag" value="{{ isset($eventData) ? json_encode(json_decode($eventData->tags)) : '["Tags1", "Tags2"]' }}"
                   class="tagify w-full leading-5 relative text-sm py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-0"
                   id="tags">
          </div>
        </label>
        <button id="update-btn" class="btn btn-primary mt-4" type="submit">Update</button>
        <a href="{{ route('master.events.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
  
    </div>
    @else
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <label class="form-control w-full max-w-xs">
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Title</span>
          </div>
          <input required type="text" name="title" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" />
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Location</span>
          </div>
          <input required type="text" name="venue" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" />
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Tanggal</span>
          </div>
          <input required type="date" name="tanggal" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" />
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Time</span>
          </div>
          <input required type="time" name="start_time" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" />
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Booking URL</span>
          </div>
          <input required type="text" name="booking_url" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" />
  
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Description</span>
          </div>
          <input required type="text" name="description" placeholder="Type here"
                 class="input input-bordered w-full max-w-xs" />
  
          <div class="mb-2 mt-2">
            <p>Event Category:</p>
            <select required name="event_category" class="select select-bordered w-full max-w-xs">
              <option value="" disabled>Select Event Category</option>
              @foreach ($categoryData as $category)
                <option value="{{$category->id}}">
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>
  
          <div class="mb-2 mt-2">
            <p>Organizer:</p>
            <select required name="organizer" class="select select-bordered w-full max-w-xs">
              <option value="" disabled selected>Select Organizer</option>
              @foreach ($organizerData as $organizer)
                <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="mb-2 mt-2">
            <label for="exampletags" class="inline-block mb-2">Tags</label>
            <input required type="text" name="tags" placeholder="input tag" 
                   class="tagify w-full leading-5 relative text-sm py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-0"
                   id="tags">
          </div>
        </label>
        <button class="btn btn-primary mt-4" type="submit">Submit</button>
        <a href="{{ route('master.events.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
  
    </div>
    @endif

    
@endsection


@section('library-js')
  <script>
    $(document).ready(function() {
      var input = $('#tags')[0];
      var tagify = new Tagify(input);
    });

    $('#update-btn').on('click', function(e){
        console.log('TESTESTES')
    })
  </script>
@endsection
