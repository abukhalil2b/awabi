@extends('layouts.attendance')

@section('content')
<div class="p-1">


    <div class="bg-white p-1 rounded">
        {{ $roundplay->title }}
    </div>

    @foreach($answers as $question)



    <div class="p-1 border rounded bg-gray-400">

        {{$question->content}}
        <hr>
        @foreach($question->answers as $answer)
        <div class="text-red-800 flex justify-between">
            <div>
                {{$answer->participant->name}}
            </div>
            <div>
                {{$answer->correct}}
            </div>
            <div>
                {{$answer->created_at->format('H:i:s')}}
            </div>
        </div>
        @endforeach
    </div>

    @endforeach

</div>

@endsection