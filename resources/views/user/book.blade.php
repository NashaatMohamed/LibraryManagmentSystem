@extends('user.layout')
@section('content')
<div class="row col my-5 ">
@foreach ($data as $book)
    <div class="card col-4 mx-4 " style="width: 18rem;">
        <a href=""><img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="card-img-top" alt="..."> </a>
        <div class="card-body">
        {!! Form::open(['route' => 'favorites.store']) !!}
        <h5 class="card-title">{{$book['title']}}</h5>
        {!! Form::hidden('title',$book['title'],['class'=>'form-control'])!!}
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <div class="row justify-content-between">
            <p style="color: maroon" class="col-5 fw-bold">rate {{$book['rate']}}  stars</p>
            {!! Form::hidden('rate',$book['rate'],['class'=>'form-control'])!!}
            <a style="font-size: 33px;text-align:center " class="addTowishlist col-4" href="">
                <button type='submit' class='btn btn-danger'><i class="fa-regular fa-heart"></i></button>
            </a>
            </div>
        <div class="row justify-content-between">
        <div class ="col-4 fw-bold">${{$book['price']}}</div>
       
        {!! Form::hidden('price',$book['price'],['class'=>'form-control'])!!}
        {!! Form::hidden('id',$book['id'],['class'=>'form-control'])!!}
        {!! Form::hidden('description',$book['description'],['class'=>'form-control'])!!}
        {!! Form::hidden('image',$book['image'],['class'=>'form-control'])!!}
        {!! Form::close() !!}
        <form action="{{ route('cart.store',$book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $book->id }}" name="id">
            <input type="hidden" value="{{$book['title']}}" name="name">
            <input type="hidden" value={{$book['price']}} name="price">
            <input type="hidden" value="1" name="quantity">
            <button class="col-6 btn btn-warning" type="submit" >Addtocart</button>
          </form>
        </div>
          <a href="{{route('show.index',$book->id)}}">  <button class="col-6 btn btn-info my-2" type="submit" >Detiles</button> </a></li>
    </div>
</div>
@endforeach
</div>
</div>
<div class="m-4 ms-5  aligns-items-center d-flex " >
    <p class="text-center">  {!!$data->links()!!}</p>
</div>



@endsection







