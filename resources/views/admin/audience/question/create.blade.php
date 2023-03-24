<x-admin-layout>

    <div class="mt-5 text-2xl p-1 w-full bg-gray-100 flex justify-start items-center">
        أسئلة الجمهور
    </div>
    @foreach($questions as $question)

    <div class="mt-3 card">
        <div>
            <span class="text-red-800 font-bold">
                محتوى السؤال:
            </span>
            {{ $question->content }}
        </div>
        <div>
            <span class="text-red-800 font-bold">
                الخيار الأول:
            </span>
            {{ $question->A }}
        </div>
        <div>
            <span class="text-red-800 font-bold">
                الخيار الثاني:
            </span>
            {{ $question->B }}
        </div>
        <div>
            <span class="text-red-800 font-bold">
                الخيار الثالث:
            </span>
            {{ $question->C }}
        </div>
        <div>
            <span class="text-red-800 font-bold">
                الخيار الرابع:
            </span>
            {{ $question->D }}
        </div>
        <div>
            <span class="text-red-800 font-bold">
                الإجابة:
            </span>
            {{ $question->ans }}
        </div>

        <div class="mt-1 text-blue-800 font-bold">
            <a href="{{ route('admin.audience.question.show',$question->id) }}">
                عرض
            </a>
        </div>
    </div>
    @endforeach


    <div x-data="{ show:false ,option:null }" class="mt-5 text-2xl p-1 w-full bg-gray-100">
        <x-secondary-button @click="show=true">
            + جديد
        </x-secondary-button>

        <div x-cloak x-show="show">


            <form action="{{ route('admin.audience.question.store') }}" method="post">
                @csrf

                <x-text-input name="content" class="mt-4 w-full" placeholder="السؤال" />

                <x-text-input name="A" class="mt-4 w-full" placeholder="A" />

                <x-text-input name="B" class="mt-4 w-full" placeholder="B" />

                <x-text-input name="C" class="mt-4 w-full" placeholder="C" />

                <x-text-input name="D" class="mt-4 w-full" placeholder="D" />

                <div class="mt-10 w-full flex justify-around">

                    <div @click=" option = 'A' " :class=" option == 'A'? 'bg-green-100 text-green-700':'' " class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                        A
                    </div>

                    <div @click=" option = 'B' " :class=" option == 'B'? 'bg-green-100 text-green-700':'' " class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                        B
                    </div>

                    <div @click=" option = 'C' " :class=" option == 'C'? 'bg-green-100 text-green-700':'' " class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                        C
                    </div>

                    <div @click=" option = 'D' " :class=" option == 'D'? 'bg-green-100 text-green-700':'' " class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                        D
                    </div>

                    <input type="hidden" x-model="option" name="ans">
                </div>

                <x-primary-button class="mt-4 w-full">
                    حفظ
                </x-primary-button>

                @if($errors->any())

                <div class="mt-4 text-red-600 bg-red-100 border border-red-600 p-1 rounded">
                    @foreach($errors->all() as $error)
                    <div>
                        {{$error}}
                    </div>
                    @endforeach
                </div>

                @endif

            </form>
        </div>
    </div>


</x-admin-layout>