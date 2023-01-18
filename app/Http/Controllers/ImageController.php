<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $images = Image::where('user_id',$user_id)->latest()->get();
        return view('myPicture',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title' => 'required',
            'image' => 'required | mimes:jpg,jpeg,png'
        ])->validate();

        $image =  $request->file('image');
        $image_name = hexdec(uniqid()).".".$image->getClientOriginalExtension();
        $image_nfdb = 'image/' . $image_name;

        $dimensions = getimagesize($image);
        $width = $dimensions[0];
        $height = $dimensions[1];
    
        
        Image::create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title,'-'),
            'file' => $image_nfdb,
            'dimention' => $width .'x'. $height,
            'user_id' => Auth::user()->id,
        ]);
        $image->move('image/', $image_name);

        Alert::success('Success','Picture uploaded successfully');
        // toast('Picture uploaded successfully','success');



        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $image = Image::findOrFail($id);
       $image->delete();
        return redirect()->back();
    }
}
