<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Types\BaseResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillsController extends Controller
{

    private $skillsFields = [
        "name_skill",
        "file_skill"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listing all skills
        return response()->json(new BaseResponse(Skills::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crete one skill
       foreach($this-> skillsFields as $value){
        if(!$request->get($value)){
            return response()->json(new BaseResponse(["skillFields"=> $value], false, "SkillField and require for a creation 😪"));
        }

       }
       
       Skills::create([
           "name_skill" => $request->get("name_skill"),
           "file_skill" => $request->get("file_skill")
       ]);

       return response()->json(new BaseResponse(null, true, "Skill created success 😜"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit(Skills $skills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skills $skills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skills $skills)
    {
        //
    }
}
