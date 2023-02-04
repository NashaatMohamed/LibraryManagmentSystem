@extends('memory.nav')

@section('content')
<!-- Button trigger modal -->
{{-- @foreach($users as $user) --}}
<form action="{{route('updatee',$users->id)}}" method="POST">
<div class="card" style="width: 18rem;">
    @csrf
    @method('put')
        <img src="" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title">
        for Name : <input type="text" value="{{$users->name}}" name = "name" class="form-control">
      </h5>
      <p class="card-text">
        for Email: <input type="email" class="form-control" name = "email" value="{{$users->email}}">
      </p>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
  {{-- @endforeach --}}
@endsection