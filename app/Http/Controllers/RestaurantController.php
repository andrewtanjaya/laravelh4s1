<?php

namespace App\Http\Controllers;


use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    protected function getAllRestaurants()
    {
        /*
         * Get data from DB
         */
    }

    protected function getRestaurantById($id)
    {
        /*
         * Get data from DB
         */
    }

    protected function addRestaurant(Request $request)
    {
        /*
         * Check if User's role is Admin,
         * Validate input,
         * Insert New Restaurant to DB
         */
    }

    protected function updateResto(Request $request, $id)
    {
        /*
         * Check if User's role is Admin,
         * Update restaurant with existing field
         */

    }

    protected function deleteResto(Request $request, $id)
    {
        /*
         * Check if User's role is Admin
         * Check restaurant existence
         * Delete restaurant from DB
         */
    }
}
