<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\File;
class TestController extends Controller
{
    //
    public function index()
    {
        $test = Test::all();
        return view('frontend.test.index',compact('test'));
    }

    public function create()
    {
        return view('frontend.test.create');
    }

    public function edit($id)
    {
        $test = Test::find($id);
        return view('frontend.test.edit',compact('test'));
    }



    public function store(Request $request)
    {
       if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/testing/',$filename);
        }
       $post = Test::create([
            'title' => $request->title,
            'body' => $request->body,
           'image' => 'uploads/testing' . '/' . $filename,
       ]);
         return redirect()->back()->with('status', 'Data Added Successfully');

    }

      public function update(Request $request ,$id)
    {
        $test = Test::find($id);
        $test ->title = $request->input('title');
        $test ->body = $request->input('body');
         if($request->hasfile('image'))
        {
            $ds = 'uploads/working/'.$test->image;
            if(File::exists($ds))
            {
                File::delete($ds);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/testing/',$filename);
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

                $post = $test->update(['image' => 'uploads/testing' . '/' . $filename]);

                }else{
         $test->update();
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

    public function destroy($id)
    {
        $testdel = Test::find($id);
        $destination = 'uploads/testing/'.$testdel->icon;
        if(File::exists($destination))
        {
          File::delete($destination);
        }
        $testdel->delete();
        return redirect()->back()->with('status', 'Info Deleted');
    }
}
