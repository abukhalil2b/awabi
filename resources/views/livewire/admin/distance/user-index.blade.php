<div>
    <a href="{{ route('admin.distance.user.updateduser_index') }}" class="mt-5 block">
    المشاركين عن بعد المحدثين بياناتهم
        ( {{ count($updatedUsers) }} )
    </a>

    <a href="{{ route('admin.distance.user.notupdateduser_index') }}" class="mt-5 block">
    المشاركين عن بعد الغير محدثين بياناتهم
    ( {{ count($notUpdatedUsers) }} )
    </a>

</div>