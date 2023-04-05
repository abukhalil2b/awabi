<x-admin-layout>
<header>
        <h2 class="text-lg font-medium text-gray-900 ">
            {{ $cate->title }}
        </h2>
    </header>
    @if($cate->status == 'disable')
    <div class="flex justify-center ">

        <a class=" w-40 rounded text-center bg-white p-1 border shadow" href="{{route('admin.distance.cate.active',$cate->id)}}">
                إرسال الأسئلة
        </a>
    </div>
    @endif
    <div class="p-3">

        <div class="flex gap-3">
        <livewire:admin.distance.multi-choice-question-create :cate="$cate" />
        
        <livewire:admin.distance.question-copy :cate="$cate" />

        </div>
        @foreach($questions as $question)

        <div class="mt-1 flex flex-col border rounded p-1 bg-white">
            {{ $question->content }}
            <div class=" {{ 'A' == $question->ans ? 'bg-green-200' : '' }} ">
                {{ $question->A }}
            </div>

            <div class=" {{ 'B' == $question->ans ? 'bg-green-200' : '' }} ">
                {{ $question->B }}
            </div>

            <div class=" {{ 'C' == $question->ans ? 'bg-green-200' : '' }} ">
                {{ $question->C }}
            </div>

            <div class=" {{ 'D' == $question->ans ? 'bg-green-200' : '' }} ">
                {{ $question->D }}
            </div>

            <div class="mt-5 flex gap-1">
                <a class="bg-white border rounded w-16 flex justify-center items-center" href="{{ route('admin.distance.question.edit',$question->id) }}">
                    تحديث
                </a>
                <div x-data="{ show:false }">
                    <x-danger-button x-cloak x-show=" ! show " @click=" show=true ">
                        حذف
                    </x-danger-button>
                    <form x-cloak x-show="show" action="{{ route('admin.distance.question.delete',$question->id) }}" method="post">
                        @csrf
                        <x-danger-button type="submit">
                            تأكيد الحذف
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach



    </div>
</x-admin-layout>