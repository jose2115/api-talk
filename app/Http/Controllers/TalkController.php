<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class TalkController extends Controller
{
    //


    public function index(){

        $talk = Talk::all();

        return $talk;
    }


    public function store(Request $request){

         //validacion de los caracteres invalidos y validos para la gestion
         $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:25|min:3',
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'data_validation_failed', "error_list"=>$validator->errors()]);
        }

        $talk = new Talk();

        $talk->name        = $request->name;
        $talk->description = $request->description;

        $talk->save();

        if($talk){
            
            return response()->json(['success' => 'Agregada']);
        }
    }

    public function update(Request $request, $id){

         //validacion de los caracteres invalidos y validos para la gestion
         $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:25|min:3',
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'data_validation_failed', "error_list"=>$validator->errors()]);
        }

        $talk = Talk::findOrFail($id);

        $talk->name        = $request->name;
        $talk->description = $request->description;

        $talk->save();

        if($talk){
            
            return response()->json(['success' => 'Actualizada']);
        }


    }

    public function destroy($id){

        if($id){
            $talk = Talk::findOrFail($id);
            $talk->delete();
    
                if($talk){
                return response()->json(['success' => 'Eliminada']);
                }
            }
    }
}
