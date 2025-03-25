@extends('layouts.attendance')

@section('content')
<div class="container mx-auto p-4">
    <!-- Roundplay Title -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-center text-gray-400">{{ $roundplay->title }}</h1>
    </div>
    
    <!-- Questions and their Answers -->
    @forelse($answers as $question)
        <div class="mb-6 bg-white shadow rounded-lg p-6">
            <!-- Question Content -->
            <h2 class="text-xl font-semibold text-gray-700 mb-4">{{ $question->content }}</h2>
            
            <!-- Answers Table -->
            @if($question->answers->isEmpty())
                <p class="text-gray-600 italic">لم يتم تقديم أي إجابات لهذا السؤال حتى الآن.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-right">
                            <tr>
                                <th class="px-4 py-2 text-xs font-medium text-gray-500">المشارك</th>
                                <th class="px-4 py-2 text-xs font-medium text-gray-500">الإجابة</th>
                                <th class="px-4 py-2 text-xs font-medium text-gray-500">صحيح</th>
                                <th class="px-4 py-2 text-xs font-medium text-gray-500">التاريخ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($question->answers as $answer)
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    {{ $answer->participant->name ?? 'مشارك غير معروف' }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-700">{{ $answer->ans }}</div>
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    @if($answer->correct)
                                        <span class="text-green-600 font-semibold">نعم</span>
                                    @else
                                        <span class="text-red-600 font-semibold">لا</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-xs text-gray-500">
                                    {{ $answer->created_at->format('H:i:s d-m-Y') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @empty
        <div class="text-center text-gray-500">
            <p>لا توجد أسئلة متاحة لهذه الجولة.</p>
        </div>
    @endforelse
</div>
@endsection
