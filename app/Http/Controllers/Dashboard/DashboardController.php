<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function index(): View
    {
        return view('dashboard.index');
    }

    function settings()
    {
        return view('dashboard.settings');
    }

    function settings_update(Request $request)
    {
        $data = $request->except('_token', '_method', 'logo');

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads', 'public');
            $data['logo'] = $path;
        }

        if ($request->hasFile('about_image')) {
            $path = $request->file('about_image')->store('uploads', 'public');
            $data['about_image'] = $path;
        }

        foreach ($data as $key => $val) {
            Setting::updateOrCreate([
                'key' => $key
            ], [
                'value' => $val
            ]);
        }

        return redirect()
            ->back()
            ->with('msg', 'Settings updated successfully')
            ->with('type', 'info');;
    }
}
