<x-admin-layout>
    <x-slot name="header">
      
    </x-slot>

    <div class="p-3 text-xs">

        
        <livewire:admin.attendance.multi-choice-question-create :cate="$cate" />

        <div x-data="{show:false}" >
            <div @click="show=true" x-cloak x-show=" ! show " class="mt-2 hover:cursor-pointer">تعديل</div>
            <div x-show="show">
                <livewire:admin.attendance.cate-update :cate="$cate" />
            </div>
        </div>
        
        <div class="mt-3 bg-white rounded p-1 w-full">
الأسئلة
        </div>
        @foreach($questions as $question)

        <div class="mt-1 flex flex-col border rounded p-1 bg-white {{ $question->status == 'close' ? 'opacity-40' : '' }}">
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
                <a class="bg-white border rounded w-16 flex justify-center items-center" href="{{ route('admin.attendance.question.edit',$question->id) }}">
                    تحديث
                </a>
                <div x-data="{ show:false }">
                    <x-danger-button x-cloak x-show=" ! show " @click=" show=true ">
                        حذف
                    </x-danger-button>
                    <form x-cloak x-show="show" action="{{ route('admin.attendance.question.delete',$question->id) }}" method="post">
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