@extends('default')

@section('content')
    @foreach($assignments as $assignment)
        <p>{{$assignment->correct_answer_1}}</p>

    @endforeach
@endsection