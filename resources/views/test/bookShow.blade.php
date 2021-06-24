@extends('default')

@section('content')
    <p>{{$book->book_title}}</p>
    <p>{{$book->author}}</p>
    <img src="{{$book->book_image}}" alt="Mooi plaatje van het boek">
@endsection