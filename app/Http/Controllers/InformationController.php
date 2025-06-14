<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function update(UpdateInformationRequest $request)
    {
        $validation = $request->validated();
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('/profile' , 'public');
            $validation['photo'] = $path;
        }
        $validation['user_id'] = Auth::id();

        $exists = Information::where('user_id' , Auth::id())->exists();
        if (!$exists) {
            Information::create($validation);
            return redirect()->route('profile.show');
        }

        $old = Auth::user()->information->photo;
        Auth::user()->information->update($validation);
        $new = Auth::user()->information->photo;
        if ($old && $old != $new) {
            Storage::disk('public')->delete($old);
        }
        return redirect()->route('profile.show');
    }
}
