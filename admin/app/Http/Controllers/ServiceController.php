<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Service');
    }


    public function getServiceData(){
        $result=json_encode(Service::orderBy('id','desc')->get());
        return $result; 
    }

   
    public function ServiceDetails(Request $req){
          $id= $req->input('id');
          $result=json_encode(Service::where('id','=',$id)->get());
          return $result;
     }




    public function ServiceDelete(Request $req){
         $id=$req->input('id');
         $result=Service::where('id','=',$id)->delete();
    
         if($result==true){      
           return 1;
         }
         else{
            return 0;
         }
    }

    public function ServiceUpdate(Request $req){
     $id= $req->input('id');
     $name= $req->input('name');
     $des= $req->input('des');
     $img= $req->input('img');
     $result= Service::where('id','=',$id)->update(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);

         if($result==true){      
           return 1;
         }
         else{
          return 0;
         }
    }

    public function ServiceAdd(Request $req){
        $name= $req->input('name');
        $des= $req->input('des');
        $img= $req->input('img');
        $result= Service::insert(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);

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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
