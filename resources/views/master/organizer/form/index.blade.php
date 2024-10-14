@extends('base.index')

@section('content')
<div class="flex justify-center items-center mt-6 mx-auto px-4">
    <h1 class="text-3xl font-bold">Create Organizer</h1>
</div>

<div class="container justify-center items-center mt-4 mx-auto px-4">
    @if(isset($organizerData))
    <form action="{{ route('organizer.update', $organizerData->id) }}" method="POST">
      @csrf
      @method('put')
      <label class="form-control w-full max-w-xs">
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Tambah Organizer</span>
          </div>
          <input required type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{$organizerData->name}}"/>
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Description</span>
          </div>
          <input required type="text" name="description" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{$organizerData->description}}"/>
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Facebook link</span>
          </div>
          <input required type="text" name="fb_link" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{$organizerData->fb_link}}" />
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Twitter Link</span>
          </div>
          <input required type="text" name="twt_link" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{$organizerData->twt_link}}"/>
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Website link</span>
          </div>
          <input required type="text" name="web_link" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{$organizerData->web_link}}"/>
      </label>
      <button class="btn btn-primary mt-4" type="submit">Update</button>
  </form>
    @else
    <form action="{{ route('organizer.store') }}" method="POST">
      @csrf
      <label class="form-control w-full max-w-xs">
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Tambah Organizer</span>
          </div>
          <input required type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Description</span>
          </div>
          <input required type="text" name="description" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Facebook link</span>
          </div>
          <input required type="text" name="fb_link" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Twitter Link</span>
          </div>
          <input required type="text" name="twt_link" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
          <div class="label mt-4">
            <span class="label-text text-lg font-semibold">Website link</span>
          </div>
          <input required type="text" name="web_link" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
      </label>
      <button class="btn btn-primary mt-4" type="submit">Submit</button>
  </form>
    @endif
    
</div>
    
@endsection