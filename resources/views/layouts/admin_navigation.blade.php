<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 print:hidden">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if(Auth::user()->app == 'distance')
                    <a href="{{ route('distance_dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                    @endif

                    @if(Auth::user()->app == 'attendance')
                    <a href="{{ route('attendance_dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                    @endif

                    @if(Auth::user()->app == 'super-admin' || Auth::user()->app == 'attendance-admin' || Auth::user()->app == 'distance-admin')
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                    @endif
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-xs">{{ Auth::user()->name }}</div>

                            <div class="mr-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- distance user can only update his profile -->
                        @if(Auth::user()->app == 'distance')
                        <x-dropdown-link :href="route('profile.edit')">
                            الملف الشخصي
                        </x-dropdown-link>
                        @endif
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-red-600">
                                تسجيل الخروج
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 px-1 border-t border-gray-200 flex flex-col items-center absolute z-10 h-screen w-1/2 bg-gray-200">
            <div class="px-4">
                <div class="font-xs text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-xs text-sm text-gray-500">
                    @if(Auth::user()->app == 'admin')
                    {{ Auth::user()->name }}
                    @endif
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- distance user can only update his profile -->
                @if(Auth::user()->app == 'distance')
                <x-responsive-nav-link :href="route('profile.edit')">
                    الملف الشخصي
                </x-responsive-nav-link>
                @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-red-700">
                        تسجيل الخروج
                    </x-responsive-nav-link>
                </form>
            </div>
            <div class="mr-1 text-white w-full text-center">
                الجماهيرية
            </div>
            @hasPermission('attendance.cate.index')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('attendance.cate.index') }}">صفحة الإسئلة</a>
            @endhasPermission

            @hasPermission('attendance.user.create')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.user.create') }}">المشاركين</a>
            @endhasPermission

            @hasPermission('attendance.roundplay.create')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.roundplay.create') }}">الجولات</a>
            @endhasPermission

            @hasPermission('attendance.cate.create')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.attendance.cate.create') }}">الأسئلة</a>
            @endhasPermission

            <hr class="mt-2">
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.setting.index') }}">إعدادات</a>

            <hr class="mt-2">
            <div class="mr-1 text-white">
                عن بعد
            </div>

            @hasPermission('distance.user.create')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.user.create') }}">المشاركين</a>
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.user.search') }}">بحث </a>

            @endhasPermission

            @hasPermission('distance.cate.create')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.cate.create') }}"> الأسئلة</a>
            @endhasPermission

            @hasPermission('distance.answer.dashboard')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.answer.dashboard') }}"> الإجابات والقرعة </a>
            @endhasPermission

            @hasPermission('distance.user')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.whatsapp.create') }}"> رسائل الواتسأب </a>
            @endhasPermission

            @if(auth()->id() == 1)
            <hr class="mt-2">
            <div class="mr-1 text-white">
                الصلاحيات
            </div>
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.permission.create') }}">الصلاحيات</a>
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.role.index') }}">الأدوار</a>
            @endif

            <hr class="mt-2">

            @if(auth()->user()->app == 'distance-admin' || auth()->user()->app == 'attendance-admin')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('questions_archive') }}">
                أرشيف الأسئلة
            </a>
            @endif

            @hasPermission('distance.user')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.wincate.index') }}">
                الفائزين
            </a>
            @endif


            @hasPermission('distance.user')
            <a class="w-full text-center block my-1 p-2 rounded bg-white text-gray-900" href="{{ route('admin.distance.winner.show') }}">
            عرض الفائزين
            </a>
            @endif

         
        </div>

    </div>
</nav>