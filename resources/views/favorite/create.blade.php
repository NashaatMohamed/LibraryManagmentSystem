@extends('memory.nav')


@section('content')
{{-- {!! Form::open(['route' => 'favorites.store']) !!} --}}

<div class="container">
<table class="table my-4">
    <thead>
      <tr>
        <th scope="col">number</th>
        <th scope="col">image</th>
        <th scope="col">discription</th>
        <th scope="col">price</th>
        <th scope="col">title</th>
        <th scope="col">Delete</th>

      </tr>
    </thead>
    <tbody>

    @foreach($favorites as $favorite)
      <tr>
        <td>{{$favorite->id}}</td>
        <td><img src="https://fakeimg.pl/250x100/"></td>
        <td>{{$favorite->discription}}</td>
        <td>{{$favorite->price}}$</td>
        <td>{{$favorite->title}}</td>
        {!!Form::open(['route'=>['favorites.destroy',$favorite->id],'method'=>'delete'])!!}
        <td><button class="btn btn-dark">unfavorite</button></td>
        {!!Form::close()!!}

      </tr>
    @endforeach

    </tbody>
  </table>
</div>
{{-- {!! Form::close() !!} --}}
@endsection

