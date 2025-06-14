<header class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 h-20">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">

                {{-- List sidebar --}}
                <x-general.listsidebarheader/>

                {{-- logo --}}
                @if (App\Models\Setting::get('logo'))
                   <img src="{{Storage::url(App\Models\Setting::get('logo'))}}" width="100px" height="100px" class=" ml-6" alt="{{config('app.name')}}">
                @else
                    <p class=" text-3xl font-medium ml-6">{{config('app.name')}}</p>
                @endif

            </div>
            <div class="flex items-center">

                {{-- drop down notification --}}
                <x-notificationheader/>

                {{-- drop down avatar --}}
                <x-general.useravatarheader/>

            </div>
        </div>
    </div>
</header>
