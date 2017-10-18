<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortenedUrl;
use App\Services\GlobalServices;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        return view('home', $data);
    }
    
    public function save(Request $request){
        $this->validate($request, array(
            'real_url' => 'required|url',
        ));
        $real_url = $request->get('real_url');
        
        $new_url = GlobalServices::generateUniqueString();
        
        while(ShortenedUrl::where('new_url', $new_url)->count()){
            $new_url = GlobalServices::generateUniqueString();
        }
        
        $shortened_url = new ShortenedUrl();
        $shortened_url->real_url = $real_url;
        $shortened_url->new_url = $new_url;
        $shortened_url->save();
        
        return redirect()->back()->with('success', "A shortened URL for {$real_url} created. <a href='".url('short/'.$new_url)."'>". url('short/'.$new_url) . "</a>");
    }
    
    public function shortenedLinks(Request $request){
        $results = ShortenedUrl::get();
        
        $data = array(
            'urls' => $results
        );
        
        return view('urls', $data);
    }
    
    public function deleteShortened(Request $request, $id){
        ShortenedUrl::find($id)->delete();
        
        return redirect()->back()->with('success', "Successfully deleted");
    }
    
    public function gotolink(Request $request, $link){
        $data = ShortenedUrl::where('new_url', $link)->first();
        
        $data->clicked = $data->clicked + 1;

        $data->save();

        return redirect()->to($data->real_url);
    }
    
    
}
