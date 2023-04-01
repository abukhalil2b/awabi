 <div class="flex gap-1">
     <button wire:click="updateStats('open')" class="border rounded p-1 {{ $setting->status == 'open' ? 'active' : '' }}">open</button>
     <button wire:click="updateStats('close')"class="border rounded p-1 {{ $setting->status == 'close' ? 'active' : '' }}">close</button>
 </div>