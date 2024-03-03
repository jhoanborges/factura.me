<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserAuthController extends Controller
{
    /**
     * @hideFromAPIDocumentation
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($user != null){
            return response()->json([
                'success' => true,
                'message' => 'User Created ',
                'data' => $user
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'User can not be created ',
                'data' => null
            ]);
        }
    
    }

    /**
     * POST - Login User
     *
     *  In order to use this api you must get a valid username and password provided by our team.
     *
     * @return User
     *
     * @bodyParam email string required Your api username. Example: api.senter@resol.es
     * @bodyParam password string required Your api password. Example: 12345678
     */
    // @phpstan-ignore-next-line
    #[Response('{
        "status": true,
        "message": "User Logged In Successfully",
        "AccountID": 13,
        "token": "10|UoxWVWcsZRblw1kAv3UHLOg1oD1enTfD1z45x3TbMm"
    }', 200)]
    // @phpstan-ignore-next-line
    #[Response('{
        "status": false,
        "message": "Email & Password does not match with our record."
    }', 404)]
    public function login(Request $request)
    {
        $loginUserData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8',
        ]);
        $user = User::where('email', $loginUserData['email'])->first();
        if (! $user || ! Hash::check($loginUserData['password'], $user->password)) {
            // @phpstan-ignore-next-line
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        // @phpstan-ignore-next-line
        return response()->json([
            'access_token' => $token,
        ]);
    }

    /**
     * POST - Logout
     *
     *
     * @authenticated
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'logged out',
        ]);
    }
}
