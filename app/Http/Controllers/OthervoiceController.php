<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Othersvoice;
use Illuminate\Support\Facades\File;
class OthervoiceController extends Controller
{
    //
        public function index()
    {
        $othervoice = Othersvoice::all();
        return view('frontend.othervoice.index',compact('othervoice'));
    }

     public function create()
    {
        return view('frontend.othervoice.create');
    }


    public function store(Request $request)
    {
        $othervoice = new Othersvoice();
        $othervoice ->customername = $request->input('customername');
        $othervoice ->description = $request->input('description');
        $othervoice ->status = $request->input('status');
        if($request->hasfile('icon'))
        {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/client/',$filename);
            $othervoice->icon=$filename;
        }
        $othervoice->save();
        return redirect()->back()->with('status', 'Client Voice Added Successfully');
    }

    public function edit($id)
    {
        $othersvoice = Othersvoice::find($id);
         return view('frontend.othervoice.edit',compact('othersvoice'));
    }

      public function update(Request $request, $id)
    {

        //  $latestwork = Latestwork::all();
        $othersvoice = Othersvoice::find($id);
        $othersvoice ->customername = $request->input('customername');
        $othersvoice ->description = $request->input('description');
        $othersvoice ->status = $request->input('status');
        if($request->hasfile('icon'))
        {
            $clientsimg = 'uploads/client/'.$othersvoice->icon;
            if(File::exists($clientsimg))
            {
                File::delete($clientsimg);
            }
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/client/',$filename);
            $othersvoice->icon=$filename;
        }
        $othersvoice->update();
        return redirect()->back()->with('status', 'Info Updated Successfully');

    }

    public function destroy ($id)
    {
        $othersvoice = Othersvoice::find($id);
        $clientsimg = 'uploads/client/'.$othersvoice->icon;
        if(File::exists($clientsimg))
        {
          File::delete($clientsimg);
        }
        $othersvoice->delete();
        return redirect()->back()->with('status', 'Info Deleted');
    }
}
