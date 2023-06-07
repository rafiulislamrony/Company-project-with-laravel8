<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Illuminate\Support\Str; // Import the Str facade

class HomeController extends Controller
{
    //
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
     //End Method

    public function AddSlider(){
        return view('admin.slider.create');
    } //End Method

    public function StoreSlider(Request $request)
    {
        $slider_image =  $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1080)->save('image/slider/'.$name_gen);

        $last_img = 'image/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->route('home.slider')->with($notification);
    }
    public function Edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function Update(Request $request, $id)
    {
        $old_image = $request->old_image;

        $slider_image =  $request->file('image');

        if($slider_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'profile-photos/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location, $img_name);

            unlink($old_image);
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Slider Updated with Image Successfully',
                'alert-type' => 'info'
            );
            
            return Redirect()->route('home.slider')->with($notification);

        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'warning'
            );
            return Redirect()->route('home.slider')->with($notification);
        }
    }

    public function Delete($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        $notification = array(
            'message' => 'Slider Delete Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

}
