<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    //

    public function index(){

        $group = Group::with('item')->get();

        return $group;
    }

    
    public function store(Request $request){

         //validacion de los caracteres invalidos y validos para la gestion
         $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:25|min:3',
        ]);

        if($validator->fails()){
            return response()->json(['error' => 'data_validation_failed', "error_list"=>$validator->errors()]);
        }

        $group = new Group();

        $group->name = $request->name;

        $group->save();

        if($group){
            
            return response()->json(['success' => 'Grupo Creado']);
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

        $group = Group::findOrFail($id);

        $group->name = $request->name;

        $group->save();

        if($group){
            
            return response()->json(['success' => 'Actualizado']);
        }


    }

    public function destroy($id){

        if($id){
            $group = Group::findOrFail($id);
            $group->delete();
    
                if($group){
                return response()->json(['success' => 'Eliminado']);
                }
            }
    }
}
