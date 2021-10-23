<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Review'); 
    }
    public function getReviewData(){
        $reviewData = json_decode(Review::all());
        return $reviewData;
    }


    public function ReviewDetails(Request $req){
        $id= $req->input('id');
        $result=json_encode(Review::where('id','=',$id)->get());
        return $result;
    }

    public function ReviewDelete(Request $req){
         $id= $req->input('id');
         $result= Review::where('id','=',$id)->delete();

         if($result==true){      
           return 1;
         }
         else{
            return 0;
         }
    }

    public function ReviewUpdate(Request $req){
         $id= $req->input('id');
         $Review_name= $req->input('Review_name');
         $Review_desc= $req->input('Review_desc');
         $Review_img = $req->input('Review_img');

         $result= Review::where('id','=',$id)->update([
            'name'=>$Review_name,
            'des'=>$Review_desc,
            'img'=>$Review_img, 
         ]);

         if($result==true){      
           return 1;
         }
         else{
          return 0;
         }
    }


    public function ReviewAdd(Request $req){
         $Review_name= $req->input('Review_name');
         $Review_desc= $req->input('Review_desc');
         $Review_img = $req->input('Review_img');
         $result= Review::insert([
            'name'=>$Review_name,
            'des'=>$Review_desc,
            'img'=>$Review_img,
         ]);

         if($result==true){      
           return 1;
         }
         else{
          return 0;
         }
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
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
