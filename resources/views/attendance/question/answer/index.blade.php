@extends('layouts.attendance')

@section('content')


<div class="px-4">
    <x-question-content>
        {{$question->content}}
    </x-question-content>
    <div class="p-3">
        <x-question-option :plink="$question->ans =='A'" letter="A">
            {{$question->A}}
        </x-question-option>
    
        <x-question-option :plink="$question->ans =='B'" letter="B">
            {{$question->B}}
        </x-question-option>
    
        <x-question-option :plink="$question->ans =='C'" letter="C">
            {{$question->C}}
        </x-question-option>
    
        <x-question-option :plink="$question->ans =='D'" letter="D">
            {{$question->D}}
        </x-question-option>
    </div>
    
    <div class="w-full px-3">
    
        @foreach($answers as $answer)
        <x-answer-result>
            <x-slot name="participant_name">
                {{$answer->participant->name}}
            </x-slot>
            <x-slot name="participant_option">
                {{$answer->content}}
            </x-slot>
            <x-slot name="ans">
                {{$answer->ans}}
            </x-slot>
            <x-slot name="resutl">
                {{$answer->correct}}
            </x-slot>
            <x-slot name="time">
                {{$answer->created_at->format('H:i:s')}}
            </x-slot>
        </x-answer-result>
        @endforeach
    
    
    </div>
    
</div>
@endsection