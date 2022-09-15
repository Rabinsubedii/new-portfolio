<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\File;
class ServiceController extends Controller
{
    //
    public function index()
    {
        $service = Service::all();
        return view('frontend.service.index',compact('service'));
    }

    public function create()
    {
        return view('frontend.service.create');
    }


    public function store(Request $request)
    {
        $service = new Service();
        $service ->name = $request->input('name');
        $service ->status = $request->input('status');
        if($request->hasfile('icon'))
        {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/service/',$filename);
            $service->icon=$filename;
        }
        $service->save();
        return redirect()->back()->with('status', 'Service Added Successfully');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('frontend.service.edit',compact('service'));
    }

     public function update(Request $req, $id)
    {

         $services = Service::all();
         $service = Service::find($id);
         $service ->name = $req->input('name');
         $service ->status = $req->input('status');
        if($req->hasfile('icon'))
        {
            $sd = 'uploads/service/'.$service->icon;
            if(File::exists($sd))
            {
                File::delete($sd);
            }
            $file = $req->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/service/',$filename);
            $service->icon=$filename;
        }
        $service->update();
          return redirect()->back()->with('status', 'Updated Successfully');

    }




     public function destroy ($id)
    {
         $service = Service::find($id);
         $servimg = 'uploads/service/'.$service->icon;
        if(File::exists($servimg))
        {
          File::delete($servimg);
        }
        $service->delete();
        return redirect()->back()->with('status', 'Service Deleted');
    }




}
