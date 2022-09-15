<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Downloadcv;
class DownloadcvController extends Controller
{
    //
    public function index()
    {
        $cv = Downloadcv::all();
        return view('frontend.cv.index',compact('cv'));
    }

     public function create()
    {
        return view('frontend.cv.create');
    }


    public function store(Request $request)
    {
        $cv = new Downloadcv();
        $cv ->title = $request->input('title');
        $cv ->status = $request->input('status');
        if($request->hasfile('cv'))
        {
            $file = $request->file('cv');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/cv/',$filename);
            $cv->cv=$filename;
        }
        $cv->save();
        return redirect()->back()->with('status', 'CV Added Successfully');
    }

    public function edit($id)
    {
        $cv = Downloadcv::find($id);
        return view('frontend.cv.edit',compact('cv'));
    }

      public function update(Request $request, $id)
    {

        //  $latestwork = Latestwork::all();
        $cv = Downloadcv::find($id);
        $cv ->title = $request->input('title');
        $cv ->status = $request->input('status');
        if($request->hasfile('cv'))
        {
            $cvfiles = 'uploads/cv/'.$cv->cv;
            if(File::exists($cvfiles))
            {
                File::delete($cvfiles);
            }
            $file = $request->file('cv');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/cv/',$filename);
            $cv->cv=$filename;
        }
        $cv->update();
        return redirect()->back()->with('status', 'CV Updated Successfully');

    }

    public function destroy ($id)
    {
        $cv = Downloadcv::find($id);
        $cvfile = 'uploads/cv/'.$cv->cv;
        if(File::exists($cvfile))
        {
          File::delete($cvfile);
        }
        $cv->delete();
        return redirect()->back()->with('status', 'CV Deleted');
    }


}
