<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please enter your email address',
                'email.email' => 'Please enter a valid email address',
                'password.required' => 'Please enter your password',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $validator->errors()->all(),
                'success' => false
            ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('token', [$user->role])->accessToken;

                if ($request->has('validator') && $request->validator == 'true') {
                    if ($user->role != 'validator') {
                        return response()->json([
                            'message' => 'User not authorized, please login with a validator account',
                            'success' => false
                        ], HttpResponse::HTTP_BAD_REQUEST);
                    }
                }

                $request->session()->regenerate();

                return response()->json([
                    'message' => 'User logged in successfully',
                    'token' => $token,
                    'user' => $user,
                    'success' => true
                ], HttpResponse::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'Your email or password is incorrect',
                    'success' => false
                ], HttpResponse::HTTP_BAD_REQUEST);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'errors' => [$e->getMessage()],
                'success' => false
            ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
