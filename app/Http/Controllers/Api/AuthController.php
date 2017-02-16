<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;



class AuthController extends Controller
{


    use AuthenticatesUsers;

    public function getUser(Request $request){

        //$user = Auth::guard('api')->user();
        $user = $request->user('api');
        return $user;
    }

   public function accessToken(Request $request)
   {
       $this->validateLogin($request);

       if ($this->hasTooManyLoginAttempts($request)) {
           $this->fireLockoutEvent($request);

           return $this->sendLockoutResponse($request);
       }

       $credentials = $this->credentials($request);

       if($token = Auth::guard('api')->attempt($credentials)){
            return $this->sendLoginResponse($request,$token);
       }

       $this->incrementLoginAttempts($request);

       return $this->sendFailedLoginResponse($request);

   }

   public function refreshToken(Request $request){
       $token = Auth::guard('api')->refresh();
       return $this->sendLoginResponse($request,$token);
   }

   public function sendLoginResponse(Request $request, $token){

       $this->clearLoginAttempts($request);//limpa tentativas de login

        return response()->json([
            'token'=>$token
        ]);
   }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );
        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);

        $errors = [$this->username() => $message];

        return response()->json([
           'message'=> $message,
           'errors'=> $errors], 403);

    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'message'=>Lang::get('auth.failed')
        ], 400);

    }

    public function logout(){
        Auth::guard('api')->logout();
        return response()->json([],204);
    }

}
