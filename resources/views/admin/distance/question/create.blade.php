<x-app-layout>

    @if($cate->status == 'disable')
    <div class="flex justify-center">

        <a class=" w-1/2 rounded text-center bg-white p-1" href="{{route('admin.distance.cate.active',$cate->id)}}">
            تفعيل أو إرسال الأسئلة
        </a>
    </div>
    @endif
    <div class="p-3">

        <livewire:admin.distance.multi-choice-question-create :cate="$cate" />

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

            <div class="mt-3 flex gap-1">
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
</x-app-layout>