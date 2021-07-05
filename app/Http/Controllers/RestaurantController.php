<?php

namespace App\Http\Controllers;


use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    protected function getAllRestaurants()
    {
        $data = Restaurant::all();
        $responseArray = [
            'success' =>true,
            'message' => "success",
            'data'=>$data
        ];
        return response()->json($responseArray, 200);
    }

    protected function getRestaurantById($id)
    {
        $responseArray = [
            'success' =>true,
            'message' => "success",
            'data'=>Restaurant::find($id)
        ];
        return response()->json($responseArray, 200);
    }

    protected function addRestaurant(Request $request)
    {
        if(auth()->user() && auth('api')->user()->role == "admin"){
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'description' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(),202);
            }

            $input = $request->all();

            $resto = Restaurant::create($input);

            $responseArray = [];
            $responseArray['success'] = true;
            $responseArray['message'] = "success";
            $responseArray['data'] = $resto;

            return response()->json($responseArray,200);
        }else{
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "UnAuthorize";
            $responseArray['error'] = "UnAuthorize";

            return response()->json($responseArray,401);
        }

    }

    protected function updateResto(Request $request, $id)
    {
        if(auth()->user() && auth('api')->user()->role == "admin") {
            $data = array_filter($request->all());
            if(count($request->all()) == 0){
                return response()->json(['success'=>false , 'message'=> 'Validation Error' , 'error'=> 'Must input at least one field'],400);
            }else{
                $resto = Restaurant::find($id);
                if($resto == null){
                    return response()->json(['success'=>false , 'message'=> 'Restaurant Error' , 'error'=> 'Restaurant Id Not Exist'],400);
                }
                $resto->update($data);
                $resto->save();

                return response()->json(['success'=>true , 'message'=> 'success', 'data'=>$resto],200);
            }

        }
        else{
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "UnAuthorize";
            $responseArray['error'] = "UnAuthorize";

            return response()->json($responseArray,401);
        }
    }

    protected function deleteResto(Request $request, $id)
    {
        if(auth()->user() && auth('api')->user()->role == "admin") {
            $resto = Restaurant::find($id);
            if ($resto == null) {
                return response()->json(['success' => false, 'message' => 'Restaurant Error', 'error' => 'Restaurant Id Not Exist'], 400);
            }
            $resto->delete();
            return response()->json(['success' => true, 'message' => 'success', 'data' => $resto], 200);
        }else{
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "UnAuthorize";
            $responseArray['error'] = "UnAuthorize";

            return response()->json($responseArray,401);
        }
    }
}
