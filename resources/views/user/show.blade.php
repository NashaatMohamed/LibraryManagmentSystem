 @extends('memory.nav')

@section('cooment')

<style>
  *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
  </style>


@if ($message = Session::get('success'))
<div class="p-2 mb-3 col d-flex justify-content-center rounded bg-danger">
    <p class="text-green-800">{{ $message }}</p>
</div>
@endif

<form action="{{route('rating',$books->id)}}" method="POST">
  @csrf
  @method('put')
<div class="rate">
  <input type="radio" id="star5" name="rate" value="5" />
  <label for="star5" title="text">5 stars</label>
  <input type="radio" id="star4" name="rate" value="4" />
  <label for="star4" title="text">4 stars</label>
  <input type="radio" id="star3" name="rate" value="3" />
  <label for="star3" title="text">3 stars</label>
  <input type="radio" id="star2" name="rate" value="2" />
  <label for="star2" title="text">2 stars</label>
  <input type="radio" id="star1" name="rate" value="1" />
  <label for="star1" title="text">1 star</label>
</div>
<button type="submit" class="btn btn-primary">Review</button>
</form>

<div class="card col-4 mx-4 " style="width: 18rem;">
  <a href=""><img src="https://fakeimg.pl/350x200/ff0000,128/000,255" class="card-img-top" alt="..."> </a>
  <div class="card-body">
  {!! Form::open(['route' => 'favorites.store']) !!}
  <h5 class="card-title">{{$books['title']}}</h5>
  {!! Form::hidden('title',$books['title'],['class'=>'form-control'])!!}
  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <div class="row justify-content-between">
      {{-- <p style="color: maroon" class="col-5 fw-bold">rate {{$books['rate']}}  stars</p> --}}
      {!! Form::hidden('rate',$books['rate'],['class'=>'form-control'])!!}
      <a style="font-size: 33px;text-align:center " class="addTowishlist col-4" href="">
          <button type='submit' class='btn btn-danger'><i class="fa-regular fa-heart"></i></button>
      </a>
      </div>
  <div class="row justify-content-between">
  <div class ="col-4 fw-bold">${{$books['price']}}</div>
 
  {!! Form::hidden('price',$books['price'],['class'=>'form-control'])!!}
  {!! Form::hidden('id',$books['id'],['class'=>'form-control'])!!}
  {!! Form::hidden('description',$books['description'],['class'=>'form-control'])!!}
  {!! Form::hidden('image',$books['image'],['class'=>'form-control'])!!}
  {!! Form::close() !!}
  <form action="{{ route('cart.store',$books->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="{{ $books->id }}" name="id">
      <input type="hidden" value="{{$books['title']}}" name="name">
      <input type="hidden" value={{$books['price']}} name="price">
      <input type="hidden" value="1" name="quantity">
      <button class="col-6 btn btn-warning" type="submit" >Addtocart</button>
    </form>
  </div>
    <a href="{{route('show.index',$books->id)}}">  <button class="col-6 btn btn-info my-2" type="submit" >Detiles</button> </a></li>
</div>
</div>



{!! Form::open(['route' => 'comment.store']) !!}
<label  class='ms-3' for="comment">Comments:</label>

<textarea class="form-control m-3 col-5" rows="5" id="comment" name="comment"></textarea>
@foreach ($errors->all() as $error)
<li class="text-danger">{{ $error }}</li>
@endforeach
<button type="submit" class="btn btn-primary ms-5" >Comment</button>

{!! Form::close() !!}


<h5 class="card-title mx-4 m-4">{{'comment'}}</h5>


@foreach($comments as $comment)
<div class="card m-5" >


  {{-- <h5 class="card-title mx-4 m-4">{{$user['name']}} : {{$user['created_at']}}</h5>  --}}
  <h5 class="card-title mx-4 m-4">{{$comment->user->name}} : {{$comment->user->created_at}}</h5>


<h6 class="card-subtitle mb-2 text-muted m-5">{{$comment['comment']}}</h6>


{!! Form::open(['route' => ['comment.destroy',$comment->id],'method' => 'delete']) !!}
  <button type="submit" class="btn btn-danger">Delete</button>
  {!! Form::close() !!}  
</div> 

@endforeach  
<h4>RelatedBooks:</h4>
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
  class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>

  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      @foreach ($relatedbooks as $relatedbook)
      <div class="col-md-3 m-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
               src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">
              {{$relatedbook->title}}
            </h4>
            <p class="card-text">
              {{$relatedbook->description}}
            </p>
            <p>
              rate {{$relatedbook->rate}} stars
            </p>
            <a class="btn btn-danger">Add to cart</a>
            <button type='submit' class='btn btn-danger'><i class="fa-regular fa-heart"></i></button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!--/.Slides-->
  </div>
@endsection


