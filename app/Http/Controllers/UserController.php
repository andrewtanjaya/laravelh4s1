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
        /*
         * Validation
         */

        /*
         * Check Credentials,
         * generate token
         */

    }

    protected function register(Request $request)
    {
        /*
         * Validation
         */

        /*
         * Create New User
         */
    }

    protected function allUser(Request $request)
    {
        /*
         * Check User role must be Admin,
         * then get User from DB
         */

    }

    protected function findUserbyId($id)
    {
        /*
         * find user from DB with id
         */
    }

    protected function updateUser(Request $request, $id)
    {
        /*
         * Update User with existing fields
         */
    }

    protected function deleteUser(Request $request, $id)
    {
        /*
         * Check user existence,
         * delete user from DB
         */
    }
}
