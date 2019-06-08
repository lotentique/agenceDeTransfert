<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    //
   public function envoiResponse($result,$message){
       $response=[
           'success'=>true,
           'data'=>$result,
           'message'=>$message
       ];

       return response()->json($response,200);
   }


   public function envoiError($error,$errorMessages=[],$code=404){
       $response=[
           'success'=>false,
           'data'=>[],
           'message'=>$error
       ];
       if(!empty($errorMessages)){
           $response['data']=$errorMessages;
       }
       return response()->json($response,$code);
   }
}