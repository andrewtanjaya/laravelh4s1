<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    protected function getRestoMenu($id)
    {
        $query = DB::table('menus');
        $responseArray = [
            'success' =>true,
            'message' => "success",
            'data'=> $query->where('restaurantid', $id)->get()
        ];
        return response()->json($responseArray, 200);
    }

    protected function getRestoMenubyId($id,$menuId)
    {
        $responseArray = [
            'success' =>true,
            'message' => "success",
            'data'=>Menu::find($menuId)
        ];
        return response()->json($responseArray, 200);
    }

    protected function deleteMenu($id,$menuId)
    {
        $resto = Restaurant::find($id);
        if ($resto == null) {
            return response()->json(['success' => false, 'message' => 'Restaurant Error', 'error' => 'Restaurant Id Not Exist'], 400);
        }
        if(auth()->user() && auth('api')->user()->role == "admin"){

            $menu = Menu::find($menuId);
            if($menu == null){
                return response()->json(['success'=>false , 'message'=> 'Menu Error' , 'error'=> 'Menu Id Not Exist'],400);
            }
            $menu->delete();
            return response()->json(['success'=>true , 'message'=> 'success', 'data'=>$menu],200);
        }else{
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "UnAuthorize";
            $responseArray['data'] = "UnAuthorize";

            return response()->json($responseArray,401);
        }

    }

    protected function addMenu(Request $request , $id)
    {
        if(auth()->user() && auth('api')->user()->role == "admin"){
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric'
            ]);

            if($validator->fails()){
                $responseArray = [];
                $responseArray['success'] = true;
                $responseArray['message'] = 'Validation Error';
                $responseArray['data'] = $validator->errors();

                return response()->json($responseArray,401);
            }

            $input = $request->all();


            $review = Menu::create($input + ['restaurantid' => $id]);

            $responseArray = [];
            $responseArray['success'] = true;
            $responseArray['message'] = "success";
            $responseArray['data'] = $review;

            return response()->json($responseArray,200);
        }else{
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "UnAuthorize";
            $responseArray['data'] = "UnAuthorize";

            return response()->json($responseArray,401);
        }
    }
}
