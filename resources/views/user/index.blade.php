@extends('memory.nav')
@section('content')
<div class="d-flex justify-content-center">
@if ($message = Session::get('success'))
<div class="p-2 mb-3 col-4 d-flex justify-content-center rounded bg-danger">
    <p class="text-green-800">{{ $message }}</p>
</div>
@endif
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">yourName</th>
        <th scope="col">Email</th>
        {{-- <th scope="col">Last</th> --}}
        <th scope="col">Updating</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href="{{route('updateprofile',$user->id)}}"><button class="btn btn-success">update</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection