<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Courses');
    }

    public function getCoursesData(){
       $result=json_encode(Course::orderBy('id','desc')->get());
        return $result;
    }

    public function CoursesDetails(Request $req){
          $id= $req->input('id');
          $result=json_encode(Course::where('id','=',$id)->get());
          return $result;
    }

    public function CoursesDelete(Request $req){
         $id=$req->input('id');
         $result=Course::where('id','=',$id)->delete();
    
         if($result==true){      
           return 1;
         }
         else{
            return 0;
         }
    }
    public function CoursesUpdate(Request $req){
        $id= $req->input('id');
        $course_name= $req->input('course_name');
        $course_des = $req->input('course_des');
        $course_fee= $req->input('course_fee');     
        $course_totalenroll = $req->input('course_totalenroll'); 
        $course_totalclass= $req->input('course_totalclass'); 
        $course_link= $req->input('course_link'); 
        $course_img = $req->input('course_img'); 

        $result= Course::where('id','=',$id)->update([
        'course_name'=>$course_name,
        'course_des'=>$course_des,
        'course_fee'=>$course_fee,
        'course_totalenroll'=>$course_totalenroll,
        'course_totalclass'=>$course_totalclass,        
        'course_link'=>$course_link,     
        'course_img'=>$course_img,
     ]);

        if($result==true){      
           return 1;
         }
        else{
          return 0;
         }
    }

    public function CoursesAdd(Request $req){
        $course_name= $req->input('course_name');
        $course_des = $req->input('course_des');
        $course_fee= $req->input('course_fee');     
        $course_totalenroll = $req->input('course_totalenroll'); 
        $course_totalclass= $req->input('course_totalclass'); 
        $course_link= $req->input('course_link'); 
        $course_img = $req->input('course_img'); 
        $result= Course::insert([
            'course_name'=>$course_name,
            'course_des'=>$course_des,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,        
            'course_link'=>$course_link,     
            'course_img'=>$course_img,
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
