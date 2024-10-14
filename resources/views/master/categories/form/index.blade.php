@extends('base.index')

@section('content')
<div class="flex justify-center items-center mt-6 mx-auto px-4">
    <h1 class="text-3xl font-bold">Event Category</h1>
</div>

<div class="container justify-center items-center mt-4 mx-auto px-4">
    @if(isset($categoryData))
    <form action="{{ route('categories.update',  $categoryData->id) }}" method="POST">

        @csrf
        @method('PUT')
        <label class="form-control w-full max-w-xs">
            <div class="label">
              <span class="label-text text-lg font-semibold">Tambah Category</span>
            </div>
            <input required type="text" name="name" placeholder="Type here" value="{{$categoryData->name}}" class="input input-bordered w-full max-w-xs" />
        </label>
        <button class="btn btn-primary mt-2" type="submit">Update</button>
    </form>
    @else
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label class="form-control w-full max-w-xs">
            <div class="label">
              <span class="label-text text-lg font-semibold">Tambah Category</span>
            </div>
            <input required type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        </label>
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
    </form>
    @endif
</div>
    
@endsection