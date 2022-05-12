<?php

namespace App\Http\Controllers;

use App\Models\ItemTalk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemTalkController extends Controller
{
    //

    public function store(Request $request, $id){

        //validacion de los caracteres invalidos y validos para la gestion
        $validator = Validator::make($request->all(), [
           'name'        => 'required|string|max:25|min:3',
           'description' => 'required|string|max:50|min:3',
       ]);

       if($validator->fails()){
           return response()->json(['error' => 'data_validation_failed', "error_list"=>$validator->errors()]);
       }

       $itemtalk = new ItemTalk();

       $itemtalk->name        = $request->name;
       $itemtalk->description = $request->description;
       $itemtalk->id_group    = $id;

       $itemtalk->save();

       if($itemtalk){
           
           return response()->json(['success' => 'Agregada']);
       }
   }

   public function update(Request $request, $id){

        //validacion de los caracteres invalidos y validos para la gestion
        $validator = Validator::make($request->all(), [
           'name'        => 'required|string|max:25|min:3',
           'description' => 'required|string|max:50|min:3',
       ]);

       if($validator->fails()){
           return response()->json(['error' => 'data_validation_failed', "error_list"=>$validator->errors()]);
       }

       $itemtalk = ItemTalk::findOrFail($id);

       $itemtalk->name        = $request->name;
       $itemtalk->description = $request->description;

       $itemtalk->save();

       if($itemtalk){
           
           return response()->json(['success' => 'Actualizada']);
       }


   }

   public function destroy($id){

       if($id){
           $ietemtalk = ItemTalk::findOrFail($id);
           $ietemtalk->delete();
   
               if($ietemtalk){
               return response()->json(['success' => 'Eliminada']);
               }
           }
   }
}
