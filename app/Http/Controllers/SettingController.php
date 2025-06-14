<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $local = Setting::get('local');
        $logo = Setting::get('logo');
        $success = Session::get('success');
        return view('setting' , compact('success' , 'local' , 'logo'));
    }

    public function update(Request $request)
    {
       foreach ($request->input('settings') as $name => $value) {
            Setting::set($name , $value);
       }

       if ($request->hasFile('logo'))
       {
            $old = Setting::get('logo');
            Setting::set('logo' , $request->file('logo')->store('/setting' , 'public'));
            $new = Setting::get('logo');
            if ($old != $new and $old != null) {
                Storage::disk('public')->delete($old);
            }
       }

       return redirect()->route('setting.edit')->with('success' , 'The proccess update was success');
    }

    public function default()
    {
       $logo = Setting::get('logo');
       $setting = Setting::where('user_id' , Auth::id());
       if ($setting) {
           $setting->delete();
       }
       if ($logo) {
           Storage::disk('public')->delete($logo);
       }
       return redirect()->route('setting.edit')->with('success' , 'The proccess default was success');
    }
}
