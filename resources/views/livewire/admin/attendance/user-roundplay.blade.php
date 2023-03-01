<div>

    @foreach($users as $user)

    <label class="block w-full border rounded p-1 mt-1 bg-white hover:cursor-pointer">
            <input 
                class="text-red-900 rounded-full focus:ring-0" 
                type="checkbox" 
                @if($user->isInRoundplay($roundplay->id)) 
                checked 
                @endif
                value="{{$user->id}}"
                wire:click="save('{{ $user->id }}')"/>

                {{ $user->name }}
        </label>

   @endforeach
</div>