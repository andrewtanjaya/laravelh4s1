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
        /*
         * Check Restaurant Existence,
         * If No review return No review
         * Else return reviews
         */
    }

    protected function addReview(Request $request,$id)
    {
        /*
         * Check if user's role is Member,
         * Validate Fields,
         * Check user existence,
         * Check restaurant existence,
         * Create Review and Insert to DB
         */

    }
}
