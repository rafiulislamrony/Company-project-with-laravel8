<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;

class PortfolioController extends Controller
{
    public function portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));

    }//End Method

    //// This is for Multi Image All Methods

     public function Multpic()
     {
         $images = Multipic::all();
         return view('admin.multipic.index', compact('images'));
     }


    public function StoreImg(Request $request)
    {
        $image =  $request->file('image');
        foreach($image as $multi_img) {
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300, 300)->save('image/multi/'.$name_gen);
            $last_img = 'image/multi/'.$name_gen;
            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        } // end of the foreach

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

}
