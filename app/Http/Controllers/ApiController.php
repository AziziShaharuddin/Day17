<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\JsonTrait;

class ApiController extends Controller
{
    //
    use jsonTrait;
    /**
     * Login API
     * @bodyParam email string required  Email of the user. Example: superadmin@invoke.com
     * @bodyParam password string required  Password of the user. Example: password
     * @bodyParam user_id int  The id of the user. Example: 9
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->jsonResponse(
                $validator->errors(),
                'Invalid input parmeter',
                422);
            // return response()->json($validator->errors(), 422);
        }

        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }
    /**
    * Dashboard
    *
    * Check that the service is up. If everything is okay, you'll get a 200 OK response.
    *
    * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
    * 
    * @authenticated
    * @header Authorization Bearer {{token}}
    * @response 401 scenario="invalid token"
     */

    public function dashboard (Request $request) {
        // use jsonTrait;
        $user_total = User::count();
        $code = 0;
        $employee = Employee::whereId(1)
        ->with(['user', 'job_history'])
        ->first();
        return $this->jsonResponse(
            compact('user_total', 'code'), //no employee
             '',
             200);
        // return response()->json(
        //     compact('user_total','code')
        // );
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    /**
     * User API 
     * Get all the user by pagination
     * @authenticated
     * @header Authorization Bearer {{token}}
     * @bodyParam page int Page number for pagination. Example: 1
     */
     

    public function users(){
        // $users = User::paginate(10);
        $users = User::where('id',2)->first();
        $users = User::paginate(10);
        // return $this->jsonSuccessResponse(compact('users'),'');
        return $this->jsonResponse(UserResource::collection($users));
    }
}