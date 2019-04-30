<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Picture;
use DB;
use Auth;

class PicturesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    
    public function create()
    {
        return view('pictures.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = Auth::user()->name;
            $file->move("storage/".$name.".png");         
            return redirect($request->url()."/../show");
        }else
        {
            return 'No file selected';
        }
    }

    public function show()
    {
        
        return view('pictures.show');
    }

    public function encode()
    {
        
        return view('pictures.encode');
    }



   
    
}