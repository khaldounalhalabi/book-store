<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SiteContentRequest;
use App\Models\SiteContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SiteContentController extends Controller
{
    public function edit()
    {
        $sc = DB::table('site_contents')->first();
        return view('admin.site-content.edit', compact('sc'));
    }

    public function update(SiteContentRequest $request)
    {
        $data = $request->validated();
        $sc = SiteContent::first();

        $sc->update($data);

        if ($request->hasFile('logo') != null) {
            Storage::disk('public')->delete($sc->logo);
            $this->handleImage($request, $sc);
        }

        return redirect()->route('admin.site_content.edit');
    }

    public function handleImage(SiteContentRequest $request, $sc): void
    {
        $destenation_path = 'site-content/images';
        $image_name = time() . '_' . $request->file('logo')->getClientOriginalName();
        $sc->logo = $destenation_path . '/' . $image_name;
        $sc->save();
        $request->file('logo')->storeAs('public/' . $destenation_path, $image_name);
//        $path = storage_path('app/public/' . $sc->logo);
//        $img = Image::make($path);
//        $img->resize(800, 50, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($path);
    }
}
