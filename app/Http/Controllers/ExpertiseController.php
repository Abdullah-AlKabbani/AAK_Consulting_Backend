<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{

    public function create (Request $request){

        $request->validate([
            "name"=>"required",
           "details"=>"required",
           "type_id"=>"required"
          ]);

          $expertise = new Expertise();

          $expertise->user_id = auth()->user()->id;
          $expertise->type_id =  $request->type_id;
          $expertise->name = $request->name;
          $expertise->details =  $request->details;
          $expertise->image_url = $request->image_url;

          $expertise->save();

          return response()->json([
           "status"=>201,
           "message"=>"expertise created successfully ",

          ]);
     }

     public function list ($id){

        $expertise = Expertise::where('type_id',$id)->get();

        return response()->json([
            "status"=>201,
            "message"=>"expertise ",
            "data"=> $expertise
        ]);
     }

     public function details($ex_id){

        $expertise = Expertise::where('id',$ex_id)->find( $ex_id);

        return response()->json([
            "status"=>true,
            "message"=>"details ",
            "data"=> $expertise
        ]);
     }

     public function delete($ex_id){

        $user_id = auth()->user()->id;

        if(Expertise::where([
            "user_id" => $user_id,
            "id" => $ex_id
        ])->exists()){
            $expertise = Expertise::find( $ex_id);
            $expertise->delete();
            return response()->json([
                "status"=>true,
                "message"=>" expertise has been deleted",
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"not exists",
            ]);
        }
     }
}
