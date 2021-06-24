@extends('default')

@section('content')
    @foreach($books as $book)
        <p>{{$book->book_title}}</p>
        <p>{{$book->author}}</p>
        <img src="{{$book->book_image}}" alt="Mooi plaatje van het boek">
    @endforeach
@endsection