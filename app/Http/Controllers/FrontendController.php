<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Latestwork;
use App\Models\Downloadcv;
use App\Models\Othersvoice;
use App\Models\Setting;
class FrontendController extends Controller
{
    //
    public function index()
    {
        $service = Service::limit(3)->get();
        $setting = Setting::all();
        $latestwork = Latestwork::all();
        $cv = Downloadcv::all();
        $othersvoice = Othersvoice::all();
        return view('frontend.index',compact([
            'service',
            'latestwork',
            'othersvoice',
            'cv',
            'setting'
        ]));
    }
}
