<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SiteContentRequest;
use App\Models\SiteContent;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SiteContentController extends Controller
{
    public function edit()
    {
        $sc = SiteContent::first();

        return view('admin.site-content.edit', compact('sc'));
    }

    public function update(SiteContentRequest $request)
    {
        $data = $request->validated();
        $sc = SiteContent::first();

        $sc->update($data);

        if ($request->hasFile('logo') != null) {

            if (isset($sc->logo)) {
                Storage::disk('public')->delete($sc->logo);
            }

            $destination_path = 'site-content/images';
            $image_name = time() . '_' . $request->file('logo')->getClientOriginalName();
            $sc->logo = $destination_path . '/' . $image_name;
            $sc->save();
            $request->file('logo')->storeAs('public/' . $destination_path, $image_name);
            $path = storage_path('app/public/' . $sc->logo);
            $img = Image::make($path);
            $img->resize(216, 31)->save($path);
        }

        if ($request->hasFile('favicon') != null) {

            if (isset($sc->favicon)) {
                Storage::disk('public')->delete($sc->favicon);
            }

            $destination_path = 'site-content/images';
            $image_name = time() . '_' . $request->file('favicon')->getClientOriginalName();
            $sc->favicon = $destination_path . '/' . $image_name;
            $sc->save();
            $request->file('favicon')->storeAs('public/' . $destination_path, $image_name);
        }

        return redirect()->route('admin.site_content.edit')->with('success', 'Edited Successfully');
    }
}
