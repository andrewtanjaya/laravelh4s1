<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    protected function getRestoReview($id)
    {
        $resto = Restaurant::find($id);
        if ($resto == null) {
            return response()->json(['success' => false, 'message' => 'Restaurant Error', 'error' => 'Restaurant Id Not Exist'], 400);
        }
        $query = DB::table('reviews');
        $reviews = $query->where('restaurantid', $id)->get();
        if (count($reviews) == 0) {
            return response()->json(['success' => false, 'message' => 'Review Error', 'error' => 'This Restaurant has no review yet'], 400);
        }

        $responseArray = [
            'success' =>true,
            'message' => "success",
            'data'=> $reviews
        ];
        return response()->json($responseArray, 200);
    }

    protected function addReview(Request $request,$id)
    {
        if(auth()->user() && auth('api')->user()->role == "member"){
            $validator = Validator::make($request->all(),[
                'userid' => 'required| numeric',
                'description' => 'required',
                'rating' => 'required|numeric|min:1|max:5'
            ]);

            if($validator->fails()){
                $responseArray = [];
                $responseArray['success'] = true;
                $responseArray['message'] = 'Validation Error';
                $responseArray['error'] = $validator->errors();

                return response()->json($responseArray,400);
            }
            $user = User::find($id);
            if($user == null){
                return response()->json(['success'=>false , 'message'=> 'User Error' , 'error'=> 'User Id Not Exist'],400);
            }

            $input = $request->all();
            $review = Review::create($input + ['restaurantid' => $id]);

            $responseArray = [];
            $responseArray['success'] = true;
            $responseArray['message'] = "success";
            $responseArray['data'] = $review;

            return response()->json($responseArray,200);
        }else{
            $responseArray = [];
            $responseArray['success'] = false;
            $responseArray['message'] = "UnAuthorize";
            $responseArray['error'] = "UnAuthorize";

            return response()->json($responseArray,401);
        }
    }
}
