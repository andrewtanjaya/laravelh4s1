<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    protected function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if($validator->fails()){
            $error = $validator->errors()->first();
            return response()->json(['success' => false,'message' => 'Validation Error','error' => $error] , 400);
        }

        if(Auth::attempt(['email' => $request->email, 'password' =>$request->password])){
            $user = Auth::user();
            $responseArray = [];
            $responseArray['success'] = true;
            $responseArray['message'] = 'success';
            $responseArray['data'] = $user->createToken('Auth Token')->accessToken;
            return response()->json($responseArray,200);
        }else{
            return response()->json(['success' => false,'message' => 'Unauthenticated','error' => 'Wrong Credentials'] , 400);
        }

    }

    protected function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'name' => 'required',
           'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'confirmation_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "Validation Error";
            $responseArray['error'] = $validator->errors();
            return response()->json($responseArray,400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $responseArray = [];
        $responseArray['success'] = true;
        $responseArray['message'] = "success";
        $responseArray['data'] = $user;

        return response()->json($responseArray,200);
    }

    protected function allUser(Request $request)
    {
        if(auth()->user() && auth('api')->user()->role == "admin") {
            $data = User::all();
            $responseArray = [
                'success' => true,
                'message' => "success",
                'data' => $data
            ];
            return response()->json($responseArray, 200);

        }

        $responseArray = [
            'success' => true,
            'message' => "Unauthorize",
            'error' => "Unauthorize"
        ];
        return response()->json($responseArray, 401);
    }

    protected function findUserbyId($id)
    {
        $responseArray = [
            'success' =>true,
            'message' => "success",
            'data'=>User::find($id)
        ];
        return response()->json($responseArray, 200);
    }

    protected function updateUser(Request $request, $id)
    {

//        $validator = Validator::make($request->all(),[
//            'name' => 'required',
//            'email' => 'required|email',
//            'address' => 'required',
//            'phone' => 'required',
//            'password' => 'required',
//            'c_password' => 'required|same:password'
//        ]);
//
//        if($validator->fails()){
//            return response()->json(['success'=>false , 'message'=> 'Validation Error' , 'error'=>$validator->errors()],400);
//        }
        $data = array_filter($request->all());
        if(count($request->all()) == 0){
            return response()->json(['success'=>false , 'message'=> 'Validation Error' , 'error'=> 'Must input at least one field'],400);
        }else{
            $user = User::find($id);
            if($user == null){
                return response()->json(['success'=>false , 'message'=> 'User Error' , 'error'=> 'User Id Not Exist'],400);
            }
            $user->update($data);
            $user->save();
            return response()->json(['success'=>true , 'message'=> 'success', 'data'=>$user],200);
        }
    }

    protected function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        if($user == null){
            return response()->json(['success'=>false , 'message'=> 'User Error' , 'error'=> 'User Id Not Exist'],400);
        }
        $user->delete();
        return response()->json(['success'=>true , 'message'=> 'success', 'data'=>$user],200);
    }
}
