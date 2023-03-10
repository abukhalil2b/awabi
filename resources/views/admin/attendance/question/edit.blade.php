<x-admin-layout>


    <div class="p-3">

        <form x-data="{ ans: '{{ $question->ans }}' }" action="{{ route('admin.attendance.question.update',$question->id) }}" method="post">
            @csrf
            <div class="mt-1 flex flex-col p-1">

                <textarea name="content" class="rounded focus:outline-none focus:ring-0 focus:border-stone-800"> {{ $question->content }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                <!-- A -->
                <div class="mt-6">
                    <x-input-label for="A" />
                    <div class="flex">
                        <div @click=" ans='A' " class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600" :class="ans == 'A' ? '!bg-green-400': '' ">A</div>
                        <x-text-input class=" rounded-r-none" id="A" name="A" value="{{ $question->A }}" />
                    </div>
                    <x-input-error :messages="$errors->get('A')" class="mt-2" />
                </div>
                <!-- B -->
                <div class="mt-6">
                    <x-input-label for="B" />
                    <div class="flex">
                        <div @click=" ans='B' " class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600" :class="ans == 'B' ? '!bg-green-400': '' ">B</div>
                        <x-text-input class=" rounded-r-none" id="B" name="B" value="{{ $question->B }}" />
                    </div>
                    <x-input-error :messages="$errors->get('B')" class="mt-2" />
                </div>

                <!-- C -->
                <div class="mt-6">
                    <x-input-label for="C" />
                    <div class="flex">
                        <div @click=" ans='C' " class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600" :class="ans == 'C' ? '!bg-green-400': '' ">C</div>
                        <x-text-input class=" rounded-r-none" id="C" name="C" value="{{ $question->C }}" />
                    </div>
                    <x-input-error :messages="$errors->get('C')" class="mt-2" />
                </div>

                <!-- D -->
                <div class="mt-6">
                    <x-input-label for="D" />
                    <div class="flex">
                        <div @click=" ans='D' " class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600" :class="ans == 'D' ? '!bg-green-400': '' ">D</div>
                        <x-text-input class=" rounded-r-none" id="D" name="D" value="{{ $question->D }}" />
                    </div>
                    <x-input-error :messages="$errors->get('D')" class="mt-2" />
                </div>

            </div>
            <input name="ans" type="hidden" x-model="ans">
            <x-primary-button class="mt-3" type="submit">
                تحديث
            </x-primary-button>

        </form>



    </div>
</x-admin-layout>