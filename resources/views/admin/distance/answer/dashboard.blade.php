<x-admin-layout>

    @foreach($answers as $answer)

    <div dir="ltr" class="text-[10px]">
        {{ $answer->phone }},
    </div>

    @endforeach

    <div class="w-full flex justify-center">
        <form action="{{ route('admin.distance.answer.delete') }}" method="post">
            @csrf
            <x-text-input type="number" class="mt-4 w-52" placeholder='ادخل رمز الحذف' name="code" />
            <x-primary-button class="mt-4 w-52">
                حذف كل الاجابات
            </x-primary-button>
        </form>
    </div>
</x-admin-layout>