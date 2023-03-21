<x-admin-layout>

    @if($question)

    <div>

    </div>
    @else

    <form action="{{ route('admin.audience.question.store') }}" method="post">
        @csrf

        <x-text-input name="content" class="mt-4 w-full" placeholder="السؤال" />

        <x-text-input name="A" class="mt-4 w-full" placeholder="A" />

        <x-text-input name="B" class="mt-4 w-full" placeholder="B" />

        <x-text-input name="C" class="mt-4 w-full" placeholder="C" />

        <x-text-input name="D" class="mt-4 w-full" placeholder="D" />

        <div class="mt-10 w-full flex justify-around">

            <div class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                A
            </div>

            <div class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                B
            </div>

            <div class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                C
            </div>

            <div class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
                D
            </div>
        </div>

        <x-primary-button class="mt-4 w-full">
            حفظ
        </x-primary-button>

    </form>
    @endif
</x-admin-layout>