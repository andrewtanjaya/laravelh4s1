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
        /*
         * Get Menus From DB
         */
    }

    protected function getRestoMenubyId($id,$menuId)
    {
        /*
         * Get Single Menu from DB
         */
    }

    protected function deleteMenu($id,$menuId)
    {
        /*
         * Check Restaurant existence,
         * Check if User's role is Admin,
         * Check Menu existence,
         * Delete Menu from DB
         */
    }

    protected function addMenu(Request $request , $id)
    {
        /*
         * Check if User's role is Admin,
         * Validate input,
         * Create Menu and Insert to DB
         */
    }
}
