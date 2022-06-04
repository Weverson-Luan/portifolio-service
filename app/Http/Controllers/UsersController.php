<?php

#export
namespace App\Http\Controllers;

# use 
use App\Models\Users; 
use App\Types\BaseResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    private $requiredFields = [
        "name",
        "email",
        "password",
        "date_nasc",
        "sex"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return response()->json(new BaseResponse(Users::all()));
    }


    public function store(Request $request)
    {
        //caso usuário mande campos faltando
        foreach($this->requiredFields as $key){
            if(!$request->get($key)){
                return response()->json(new BaseResponse(["field"=> $key], false, "SkillField and require for a creation 😪"));
            }
        }

        //criando usuário
        Users::create([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "password" => $request->get("password"),
            "date_nasc" => $request->get("date_nasc"),
            "sex"=> $request->get("sex"),
        ]);

        return response()->json(new BaseResponse(null, true, "User created success 😜"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
         $users = Users::find($id);
        if($users){
            return response()->json(new BaseResponse($users));
        };

        return response()->json(new BaseResponse(null, false, "User is not Exists!"));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $users = Users::find($id);
        if(!$users){
            return response()->json(new BaseResponse(null, false, "User is not Exists!"));
        };

         //caso usuário mande campos faltando
         foreach($this->requiredFields as $key){
            if(!$request->get($key)){
                return response()->json(new BaseResponse(["field"=> $key], false, "Campos is rqeuired!"));
            }
        }

        //criando usuário
        $users->update([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "password" => $request->get("password"),
            "date_nasc" => $request->get("date_nasc"),
            "sex"=> $request->get("sex"),
        ]);

        return response()->json(new BaseResponse(null, true, "User updated success!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
