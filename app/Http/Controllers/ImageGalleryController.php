<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageGallery;


class ImageGalleryController extends Controller
{
     public function index()
    {
        $images = ImageGallery::where('user_id', '=', auth()->user()->id)->get();
        return view('/dashboard',compact('images'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $user_id = auth()->user()->id;

        $input['title'] = $request->title;
        $input['user_id'] = $user_id;
        ImageGallery::create($input);


        return back()
            ->with('success','Image Uploaded successfully.');
    }

     public function destroy($id)
    {
        ImageGallery::find($id)->delete();
        return back()
            ->with('success','Image removed successfully.');    
    }
}
