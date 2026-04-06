<div class="p-1 text-xs shadow hidden sm:block">
    <div class="mr-1 text-white">
        الجماهيرية
    </div>
    @hasPermission('attendance.cate.index')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('attendance.cate.index') }}">صفحة الإسئلة</a>
    @endhasPermission

    @hasPermission('attendance.roundplay.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.roundplay.create') }}">الجولات</a>
    @endhasPermission

    @hasPermission('attendance.user.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.user.create') }}">المشاركين</a>
    @endhasPermission


    @hasPermission('attendance.cate.create')
    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.cate.create') }}">الأسئلة</a>
    @endhasPermission

  

    @if(auth()->id() == 1)
    <hr class="mt-2">

    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.role.index') }}">الأدوار</a>
 

    <hr class="mt-2">

    <a class="block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('questions_archive') }}">
        أرشيف الأسئلة
    </a>
    @endif


 
    
</div>