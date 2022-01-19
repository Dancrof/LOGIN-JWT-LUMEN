<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Validator\AuthValidator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /** 
     * @var User  
     */
    private $model;
    /** 
     * @var Request  
     */
    private $request;

    /**
     * @var AuthValidator
     */
    private $validator;

    public function __construct(AuthValidator $authValidator, Request $request, User $userModel)
    {
        $this->validator = $authValidator;
        $this->request = $request;
        $this->model = $userModel;

        $this->middleware('auth', ['except' => ['login', 'refresh', 'logout']]);
    }
    
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request){
       
        $validator = $this->validator->validate(); 
        
        if($validator->fails()){
            return response([
                'status' => 422,
                'message' => 'Error',
                'erros' => $validator->errors()
            ], 422);
        
        } else {
            $credentials = $request->only(['email', 'password']);

            if(! $token = Auth::attempt($credentials)){
                return response('Unauthorized', 401);
            }

            return $this->respondWithToken($token);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response(auth()->user(), 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        
        auth()->logout();

        return response('Gracias por visitarnos :D', 200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $this->model->setRememberToken($token);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user(),
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
