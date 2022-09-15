<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
class SettingController extends Controller
{
    //
    public function index()
    {
        $setting = Setting ::all();
        return view('frontend.setting.index',compact('setting'));
    }

    public function create()
    {
        return view('frontend.setting.create');
    }

    public function store(Request $request)
    {
        $setting = new Setting();
        $setting ->copyrightinfo = $request->input('copyrightinfo');
        $setting ->emailaddress = $request->input('emailaddress');
        $setting ->phonenumber = $request->input('phonenumber');
        $setting ->post = $request->input('post');
        $setting ->address = $request->input('address');
        $setting ->gitlink = $request->input('gitlink');
        $setting ->instalink = $request->input('instalink');
        $setting ->fblink = $request->input('fblink');
        $setting ->map = $request->input('map');
        $setting ->status = $request->input('status');

        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/logo/',$filename);
            $setting->logo=$filename;
        }
        $setting->save();
          if($request->hasfile('homeimg'))
        {
            $file = $request->file('homeimg');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/homeimg/',$filename);
            $setting->homeimg=$filename;
        }
        $setting->save();
          if($request->hasfile('addressicon'))
        {
            $file = $request->file('addressicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/addressicon/',$filename);
            $setting->addressicon=$filename;
        }
        $setting->save();
          if($request->hasfile('phoneicon'))
        {
            $file = $request->file('phoneicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/phoneicon/',$filename);
            $setting->phoneicon=$filename;
        }
        $setting->save();
          if($request->hasfile('emailicon'))
        {
            $file = $request->file('emailicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/emailicon/',$filename);
            $setting->emailicon=$filename;
        }
        $setting->save();
          if($request->hasfile('giticon'))
        {
            $file = $request->file('giticon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/giticon/',$filename);
            $setting->giticon=$filename;
        }
        $setting->save();
          if($request->hasfile('fbicon'))
        {
            $file = $request->file('fbicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/fbicon/',$filename);
            $setting->fbicon=$filename;
        }
        $setting->save();
          if($request->hasfile('instaicon'))
        {
            $file = $request->file('instaicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/instaicon/',$filename);
            $setting->instaicon=$filename;
        }
        $setting->save();
         return redirect()->back()->with('status', 'Settings Added Successfully');
    }

     public function edit($id)
    {
        $setting = Setting::find($id);
         return view('frontend.setting.edit',compact('setting'));
    }

      public function update(Request $request, $id)
    {

        //  $latestwork = Latestwork::all();
        $setting = Setting::find($id);
        $setting ->copyrightinfo = $request->input('copyrightinfo');
        $setting ->emailaddress = $request->input('emailaddress');
        $setting ->phonenumber = $request->input('phonenumber');
        $setting ->post = $request->input('post');
        $setting ->address = $request->input('address');
        $setting ->gitlink = $request->input('gitlink');
        $setting ->instalink = $request->input('instalink');
        $setting ->fblink = $request->input('fblink');
        $setting ->map = $request->input('map');
        $setting ->status = $request->input('status');
       if($request->hasfile('logo'))
        {
            $logos = 'uploads/logo/'.$setting->logo;
            if(File::exists($logos))
            {
                File::delete($logos);
            }
            $file = $request->file('logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/logo/',$filename);
            $setting->logo=$filename;
        }
        if($request->hasfile('homeimg'))
        {
            $homeimgs = 'uploads/homeimg/'.$setting->homeimg;
            if(File::exists($homeimgs))
            {
                File::delete($homeimgs);
            }
            $file = $request->file('homeimg');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/homeimg/',$filename);
            $setting->homeimg=$filename;
        }


        if($request->hasfile('addressicon'))
        {
            $addressicons = 'uploads/addressicon/'.$setting->addressicon;
            if(File::exists($addressicons))
            {
                File::delete($addressicons);
            }
            $file = $request->file('addressicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/addressicon/',$filename);
            $setting->addressicon=$filename;
        }
        if($request->hasfile('phoneicon'))
        {
            $phoneicons = 'uploads/phoneicon/'.$setting->phoneicon;
            if(File::exists($phoneicons))
            {
                File::delete($phoneicons);
            }
            $file = $request->file('phoneicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/phoneicon/',$filename);
            $setting->phoneicon=$filename;
        }
        if($request->hasfile('emailicon'))
        {
            $emailicons = 'uploads/emailicon/'.$setting->emailicon;
            if(File::exists($emailicons))
            {
                File::delete($emailicons);
            }
            $file = $request->file('emailicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/emailicon/',$filename);
            $setting->emailicon=$filename;
        }
        if($request->hasfile('giticon'))
        {
            $giticons = 'uploads/giticon/'.$setting->giticon;
            if(File::exists($giticons))
            {
                File::delete($giticons);
            }
            $file = $request->file('giticon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/giticon/',$filename);
            $setting->giticon=$filename;
        }
        if($request->hasfile('fbicon'))
        {
            $fbicons = 'uploads/fbicon/'.$setting->fbicon;
            if(File::exists($fbicons))
            {
                File::delete($fbicons);
            }
            $file = $request->file('fbicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/fbicon/',$filename);
            $setting->fbicon=$filename;
        }
        if($request->hasfile('instaicon'))
        {
            $instaicons = 'uploads/instaicon/'.$setting->instaicon;
            if(File::exists($instaicons))
            {
                File::delete($instaicons);
            }
            $file = $request->file('instaicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/instaicon/',$filename);
            $setting->instaicon=$filename;
        }

        $setting->update();
        return redirect()->back()->with('status', 'Settings Updated Successfully');

    }

    public function destroy ($id)
    {
        $setting = Setting::find($id);
        $logos = 'uploads/logo/'.$setting->logo;
        if(File::exists($logos))
        {
          File::delete($logos);
        }
        $homeimgs = 'uploads/homeimg/'.$setting->homeimg;
        if(File::exists($homeimgs))
        {
          File::delete($homeimgs);
        }
        $addressicons = 'uploads/addressicon/'.$setting->addressicon;
        if(File::exists($addressicons))
        {
          File::delete($addressicons);
        }
        $phoneicons = 'uploads/phoneicon/'.$setting->phoneicon;
        if(File::exists($phoneicons))
        {
          File::delete($phoneicons);
        }
        $emailicons = 'uploads/emailicon/'.$setting->emailicon;
        if(File::exists($emailicons))
        {
          File::delete($emailicons);
        }
        $giticons = 'uploads/giticon/'.$setting->giticon;
        if(File::exists($giticons))
        {
          File::delete($giticons);
        }
        $fbicons = 'uploads/fbicon/'.$setting->fbicon;
        if(File::exists($fbicons))
        {
          File::delete($fbicons);
        }
        $instaicons = 'uploads/instaicon/'.$setting->instaicon;
        if(File::exists($instaicons))
        {
          File::delete($instaicons);
        }
        $setting->delete();
        return redirect()->back()->with('status', 'Settings Deleted');
    }
}
