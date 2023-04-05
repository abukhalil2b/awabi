<x-admin-layout>

    <div class="p-1">

        @foreach($winners as $winner)

        <div>
            {{ $winner->phone }}
        </div>

        @endforeach

    </div>

</x-admin-layout>