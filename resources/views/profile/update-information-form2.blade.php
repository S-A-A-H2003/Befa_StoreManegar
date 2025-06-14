<form action="{{route('information.update')}}" method="POST" enctype="multipart/form-data"
    class=" block w-full has-[50vh] shadow-md rounded-md">
    @csrf
    @method('put')
    <div class="p-9">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="photo" value="{{ __('photo') }}" />
            <x-input name="photo" type="file" class="mt-1 p-2 border-[1px] border-gray-300 block w-full"
                value="{{old('photo')}}" />
            <x-input-error for="photo" class="mt-2" />

            @if(Auth::user()->information and Auth::user()->information->photo)
                <img class=" w-96 h-96 rounded-md" src="{{Auth::user()->information->photo}}" alt="">
            @endif
            <br>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('city') }}" />
            <x-input name="city" type="text" class="mt-1 block w-full" value="{{Auth::user()->information->city ?? ''}}"
                required />
            <x-input-error for="city" class="mt-2" />
            <br>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('address') }}" />
            <x-input name="address" type="text" class="mt-1 block w-full"
                value="{{Auth::user()->information->address ?? ''}}" required />
            <x-input-error for="address" class="mt-2" />
            <br>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="date_barth" value="{{ __('date_barth') }}" />
            <x-input name="date_barth" type="date" class="mt-1 block w-full"
                value="{{Auth::user()->information->date_barth ?? ''}}" required />
            <x-input-error for="date_barth" class="mt-2" />
            <br>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="age" value="{{ __('age') }}" />
            <x-input name="age" type="number" class="mt-1 block w-full" value="{{Auth::user()->information->age ?? ''}}"
                required />
            <x-input-error for="age" class="mt-2" />
            <br>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="gender" value="{{ __('gender') }}" />
            <select name="gender" value="{{Auth::user()->information->gender ?? ''}}">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <x-input-error for="gender" class="mt-2" />
            <br>
        </div>
        <br>
    </div>

    <div class="flex items-center justify-end  px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            wire:loading.attr="disabled" wire:target="photo">
            Save
        </button>
    </div>

</form>
