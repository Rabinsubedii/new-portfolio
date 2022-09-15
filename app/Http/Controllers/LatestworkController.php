<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latestwork;
use App\Models\Setting;
use App\Models\Downloadcv;
use Illuminate\Support\Facades\File;
class LatestworkController extends Controller
{
    //
        public function index()
    {
        $latestwork = Latestwork::all();
        return view('frontend.latestwork.index',compact('latestwork'));
    }

     public function create()
    {
        return view('frontend.latestwork.create');
    }


    public function store(Request $request)
    {
       if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/latestworkimg/',$filename);
        }
       $post = Latestwork::create([
            'title' => $request->title,
            'url' => $request->url,
            'status' => $request->status,
            'description' => $request->description,
           'image' => 'uploads/latestworkimg' . '/' . $filename,
       ]);
         return redirect()->back()->with('status', 'Data Added Successfully');

    }

    public function edit($id)
    {
        $latestwork = Latestwork::find($id);
        return view('frontend.latestwork.edit',compact('latestwork'));
    }

      public function update(Request $request ,$id)
    {
        $latestwork = Latestwork::find($id);
        $latestwork ->title = $request->input('title');
        $latestwork ->url = $request->input('url');
        $latestwork ->status = $request->input('status');
        $latestwork ->description= $request->input('description');
         if($request->hasfile('image'))
        {
            $imglts = 'uploads/latestworkimg/'.$latestwork->image;
            if(File::exists($imglts))
            {
                File::delete($imglts);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/latestworkimg/',$filename);
             }

             if ($request->hasFile('upload'))
             {
            $bs = 'media'.$test->body;
            if(File::exists($bs))
            {
                File::delete($bs);
            }
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('media'), $fileName);

        $url = asset('media/' . $fileName);
        return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
    }

            if(isset($filename) && ($filename != '')){

                $post = $latestwork->update(['image' => 'uploads/latestworkimg' . '/' . $filename]);

                }else{
         $latestwork->update();
                }
        return redirect()->back()->with('status', 'Updated Successfully');
    }




    public function upload(Request $request){
    if ($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('media'), $fileName);

        $url = asset('media/' . $fileName);
        return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
    }
}


    public function workdetails($slug)
    {
        $latestwork = Latestwork::all();
        if(Latestwork::where('slug',$slug)->exists())
        {
            $latestwork = Latestwork::where('slug',$slug)->first();
            $setting = Setting::all();
            $cv = Downloadcv::all();
            return view('frontend.latestwork.workdetails',compact(['latestwork','setting','cv']));
        }else{
            return redirect ('/')->with('status',"The link was broken");
        }
    }



    public function destroy ($id)
    {
         $latestwork = Latestwork::find($id);
         $latestworkimg = 'uploads/latestworkimg/'.$latestwork->image;
        if(File::exists($latestworkimg))
        {
          File::delete($latestworkimg);
        }
        $latestwork->delete();
        return redirect()->back()->with('status', 'Latest Work Deleted');
    }
}
