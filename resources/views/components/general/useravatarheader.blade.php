<div class="flex items-center ms-3 mr-5">

    <div class="flex items-center">
        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
            type="button">
            <span class="sr-only">Open user menu</span>
            @if(Auth::user()->information and Auth::user()->information->photo)
                <img class="w-8 h-8 rounded-full" src="{{Auth::user()->information->photo}}" alt="user photo">
            @else
                <img class="w-8 h-8 rounded-full" src="" alt="photo">
            @endif
        </button>
        <p class=" ml-3">{{Auth::user()->name}}</p>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdownAvatar"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 absolute right-9 top-16">
        <div class="px-4 py-3 text-sm text-gray-900">
            <div>{{Auth::user()->name}}</div>
            <div class="font-medium truncate">{{Auth::user()->email}}</div>
        </div>
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatarButton">
            <li>
                <a href="{{route('profile.show')}}"
                    class="block px-4 py-2 hover:bg-gray-100">profile</a>
            </li>
            <li>
                <a href="{{route('setting.edit')}}"
                    class="block px-4 py-2 hover:bg-gray-100">Settings</a>
            </li>

        </ul>
        <div class="py-2">

            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" >
                @csrf
                <button type="submit">logout</button>
            </form>
        </div>
    </div>

</div>
