 <div class="flex gap-1">
     <button wire:click="updateStats('open')" class="border rounded p-1 {{ $setting->status == 'open' ? 'active' : 'opacity-20' }}">مفتوح</button>
     <button wire:click="updateStats('close')"class="border rounded p-1 opa {{ $setting->status == 'close' ? 'active' : 'opacity-20' }}">مغلق</button>
 </div>