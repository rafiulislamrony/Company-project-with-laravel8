<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str; // Import the Str facade

class ServiceController extends Controller
{
    //
    public function HomeService(){
        $services = Service::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    public function AddService(){
        return view('admin.service.create');
    }

    public function StoreService(Request $request){
        $validateData = $request->validate(
            [
                'icon' => 'required',
                'title' => 'required',
            ]
        );

        Service::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('home.service')->with($notification);

    }

    public function EditService($id){
        $services = Service::find($id);
        return view('admin.service.edit', compact('services'));
    }

    public function UpdateService(Request $request, $id)
    {
        Service::find($id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('home.service')->with($notification);
    }

    public function DeleteService($id)
    {
        Service::find($id)->delete();
        $notification = array(
            'message' => 'Service Delete Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);

    }

}
