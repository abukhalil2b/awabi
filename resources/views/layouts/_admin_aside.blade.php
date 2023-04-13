<div class="p-1 text-xs shadow hidden sm:block print:hidden">
    <div class="mr-1 text-white">
        الجماهيرية
    </div>
    @hasPermission('attendance.cate.index')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('attendance.cate.index') }}">صفحة الإسئلة</a>
    @endhasPermission

    @hasPermission('attendance.user.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.user.create') }}">المشاركين</a>
    @endhasPermission

    @hasPermission('attendance.roundplay.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.roundplay.create') }}">الجولات</a>
    @endhasPermission

    @hasPermission('attendance.cate.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.cate.create') }}">الأسئلة</a>
    @endhasPermission

    <hr class="mt-2">
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.setting.index') }}">إعدادات</a>

    <hr class="mt-2">
    <div class="mr-1 text-white">
        عن بعد
    </div>

    @hasPermission('distance.user.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.user.create') }}">المشاركين</a>
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.user.search') }}">بحث </a>
    @endhasPermission

    @hasPermission('distance.cate.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.cate.create') }}"> الأسئلة </a>
    @endhasPermission

    @hasPermission('distance.answer.dashboard')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.answer.dashboard') }}"> الإجابات والقرعة </a>
    @endhasPermission

    @hasPermission('distance.user')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.whatsapp.create') }}"> رسائل الواتسأب </a>
    @endhasPermission

    @if(auth()->id() == 1)
    <hr class="mt-2">

    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.permission.create') }}">الصلاحيات</a>
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.role.index') }}">الأدوار</a>

    @endif

    <hr class="mt-2">
    @if(auth()->user()->app == 'distance-admin' || auth()->user()->app == 'attendance-admin')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('questions_archive') }}">
        أرشيف الأسئلة
    </a>
    @endif

    @hasPermission('distance.user')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.wincate.index') }}">
        الفائزين
    </a>
    @endif

    @hasPermission('distance.user')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.winner.show') }}">
        عرض الفائزين
    </a>
    @endif

    
</div>