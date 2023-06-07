<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str; // Import the Str facade

class AboutController extends Controller
{
    //
    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));

    }//End Method
    public function AddAbout()
    {
        return view('admin.home.create');
    }//End Method

    public function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'About Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('home.about')->with($notification);

    }

    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);
        return view('admin.home.edit', compact('homeabout'));
    }//End Method

    public function UpdateAbout(Request $request, $id)
    {
       $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        ]);

        $notification = array(
            'message' => 'About Update Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('home.about')->with($notification);
    }

    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->delete();
        $notification = array(
            'message' => 'About Delete Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);

    }

}
