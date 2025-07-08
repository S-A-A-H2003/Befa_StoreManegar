<button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
    class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none mr-5"
    type="button">
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
        <path
            d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
    </svg>

    @if($notificationsUnRead->count()>0)
        <div class="absolute block w-6 h-6 bg-red-500 border-2 border-white rounded-full -top-0.5 start-3 text-white">
            {{$notificationsUnRead->count()}}
        </div>
    @else
        <div class="absolute block w-6 h-6 bg-green-500 border-2 border-white rounded-full -top-0.5 start-3 text-white">
            0
        </div>
    @endif
</button>

<!-- Dropdown menu -->
<div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-sm absolute top-16 right-16">
    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
       Unread Notifications
    </div>
    <div class="divide-y divide-gray-100 overflow-y-scroll h-[137px]">

        @forelse ($notificationsUnRead as $notification)
            <a href="{{$notification->data['link']}}??nid={{$notification->id}}" class="flex px-4 py-3 hover:bg-gray-100">
                <div class="shrink-0">
                    <img class="rounded-full w-11 h-11" src="{{$notification->data['img']}}" alt="Jese image">

                </div>
                <div class="w-full ps-3">
                    <div class="text-gray-500 text-sm mb-1.5">{{$notification->data['title']}}<span
                            class="font-semibold text-gray-900"> {{$notification->data['name']}}</span>:
                        {{$notification->data['description']}}</div>
                    <div class="text-xs text-blue-600 flex items-center">
                        <div class="h-3 w-3 rounded-full inline-block mr- bg-red-500 mr-2"></div>
                        {{$notification->created_at->diffForHumans()}}
                    </div>
                </div>
            </a>
        @empty
            <div class=" w-full h-full flex flex-col items-center justify-center">
                <p class=" text-xs text-gray-500  p-5 text-center">Not found any unreadnotification yet.</p>
            </div>
        @endforelse
    </div>

    <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
        Read Notification
    </div>
    <div class="divide-y divide-gray-100 overflow-y-scroll h-[137px]">
        @forelse ($notificationsRead as $notification)
            <a href="{{$notification->data['link']}}??nid={{$notification->id}}" class="flex px-4 py-3 hover:bg-gray-100">
                <div class="shrink-0">
                    <img class="rounded-full w-11 h-11" src="{{$notification->data['img']}}" alt="Jese image">
                </div>
                <div class="w-full ps-3">
                    <div class="text-gray-500 text-sm mb-1.5">{{$notification->data['title']}}<span
                            class="font-semibold text-gray-900"> {{$notification->data['name']}}</span>:
                        {{$notification->data['description']}}</div>
                    <div class="text-xs text-blue-600 flex items-center">
                        <div class="h-3 w-3 rounded-full inline-block mr- bg-green-500 mr-2"></div>
                        {{$notification->created_at->diffForHumans()}}
                    </div>
                </div>
            </a>
        @empty
            <div class=" w-full h-full flex flex-col items-center justify-center">
                <p class=" text-xs text-gray-500  p-5 text-center">Not found any old notification yet.</p>
            </div>
        @endforelse
    </div>
</div>
