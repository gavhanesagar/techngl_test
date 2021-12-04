<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $os = str_replace('"', '', $request->headers->get('sec-ch-ua-platform'));
        $language = $request->headers->get('accept-language');
        $device = gethostname();        
        $browserData = explode(',', $request->headers->get('sec-ch-ua'));
        $browserData = explode(';', $browserData[2]);
        $browser = str_replace('"', '', $browserData[0].' '.str_replace('v=', 'Version ',$browserData[1]));
        
        $clientDetails = array(
            'browser' => $browser,
            'device' => $device,
            'os' => $os,
            'language' => $language
        );
        $userInfo = UserInfo::where('user_id', Auth::user()->id)->first();
        return view('home', compact('userInfo', 'clientDetails'));
    }
}
