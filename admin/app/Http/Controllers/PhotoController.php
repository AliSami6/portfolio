<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Photo');
    }

    public function PhotoDelete(Request $request){
      $OldPhotoURL=$request->input('OldPhotoURL');
      $OldPhotoID=$request->input('id');


      $OldPhotoURLArray= explode("/", $OldPhotoURL);
      $OldPhotoName=end($OldPhotoURLArray);
      $DeletePhotoFile=Storage::delete('public/'.$OldPhotoName);

      $DeleteRow= Photo::where('id',$OldPhotoID)->delete();
        return response()->json($DeleteRow);

      // return  $DeleteRow;
    }

    public function PhotoJSON(Request $request){
        return Photo::take(3)->get();
    }


    public function PhotoJSONByID(Request $request){
        $FirstID=$request->id;
        $LastID=$FirstID+3;
        return Photo::where('id','>=',$FirstID)->where('id','<',$LastID)->get();
    }

    public function PhotoUpload(Request $request){
        $photoPath=  $request->file('photo')->store('public');

        $photoName=(explode('/',$photoPath))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

      $result= Photo::insert(['location'=>$location]);
      return $result;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
