<div>
    <div class="mt-1">
        كلمة المرور: {{ $user->plain_password }}
    </div>
    <x-primary-button wire:click="updatePassword">
        إعادة كلمة المرور الإفتراضية
        (رقم الهاتف)
    </x-primary-button>
</div>