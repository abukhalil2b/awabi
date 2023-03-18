<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin - distance - cate - create
        </h2>
    </x-slot>

    <div x-data="{ show:false }" class="p-1 w-96">
        <x-primary-button x-cloak x-show=" ! show" @click="show=true" class="mt-1">
            + جديد
        </x-primary-button>
        <form x-cloak x-show="show" action="{{ route('admin.distance.cate.store') }}" method="POST">
            @csrf
            <div class="mt-6">
                <x-input-label for="title" />
                <x-text-input class="w-80" name="title" id="title" wire:model.lazy="title" placeholder=" عنوان التصنيف " />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="flex w-80 gap-1">

                <x-primary-button class="w-full justify-center mt-1">
                    حفظ
                </x-primary-button>
                <x-secondary-button @click="show=false" class="w-full justify-center mt-1">
                    إلغاء
                </x-secondary-button>
            </div>
        </form>

    </div>
    <div class="p-1 grid md:grid-cols-3">

        @foreach($cates as $cate)
        <div class="mt-1 p-1 border rounded flex flex-col items-center bg-white w-full {{ $cate->status =='active' ? '' : 'opacity-30' }}">
            {{ $cate->title }}
            <a href="{{ route('admin.distance.question.create',$cate->id) }}" class="text-red-800">
                الأسئلة

                (  {{ $cate->questions->count() }} )
            </a>
            
            <a href="{{ route('admin.distance.question.answer_index',$cate->id) }}" class="text-red-800">
                الإجابات 
            </a>

        </div>
        @endforeach
    </div>
</x-admin-layout>