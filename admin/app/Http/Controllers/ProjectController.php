<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Project');
    }

    public function getProjectData(){
       $result=json_encode(Project::orderBy('id','desc')->get());
        return $result;
    }

    public function ProjectDetails(Request $req){
          $id= $req->input('id');
          $result=json_encode(Project::where('id','=',$id)->get());
          return $result;
    }

    public function ProjectDelete(Request $req){
         $id=$req->input('id');
         $result=Project::where('id','=',$id)->delete();
    
         if($result==true){      
           return 1;
         }
         else{
            return 0;
         }
    }
    public function ProjectUpdate(Request $req){
        $id= $req->input('id');
        $project_name= $req->input('project_name');
        $project_desc= $req->input('project_desc');
        $project_link= $req->input('project_link');
        $project_img = $req->input('project_img');

        $result= Project::where('id','=',$id)->update([
        'project_name'=>$project_name,
        'project_desc'=>$project_desc,
        'project_link'=>$project_link,
        'project_img'=>$project_img,    
     ]);

        if($result==true){      
           return 1;
         }
        else{
          return 0;
         }
    }

    public function ProjectAdd(Request $req){
        $project_name= $req->input('project_name');
        $project_desc= $req->input('project_desc');
        $project_link= $req->input('project_link');
        $project_img = $req->input('project_img');
        $result= Project::insert([
            'project_name'=>$project_name,
            'project_desc'=>$project_desc,
            'project_link'=>$project_link,
            'project_img'=>$project_img,
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
