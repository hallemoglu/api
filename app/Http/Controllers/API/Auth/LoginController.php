<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifiedAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all() , [
                "email" => "required",
                "password" => "required"
            ]);
            if($validator->fails()) {
                return Response::json([
                    "validatorErrors" => $validator->errors()
                ], 422);
            }
            $user = User::where("email", $request->email)->first();
            if($user) {
                if($user->email_verified_at != null) {
                    if(!Hash::check($request->password, $user->password)) {
                        return Response::json([
                            "warningType" => "warning",
                            "warningIcon" => "ShiledAlert",
                            "warningTitle" => "Dikkat!",
                            "warningMessage" => "E-posta adresiniz veya şifreniz hatalı!"
                        ], 422);
                    }
                    return Response::json([
                        "successType" => "success",
                        "successIcon" => "ShieldCheck",
                        "successTitle" => "Başarılı!",
                        "successMessage" => "Giriş yapıldı. Anasayfaya yönlendiriliyorsunuz."
                    ], 200);
                }else {
                    return Response::json([
                        "warningType" => "warning",
                        "warningIcon" => "ShieldAlert",
                        "warningTitle" => "Dikkat!",
                        "warningMessage" => "E-posta adresiniz doğrulanmamış! Size yeni bir doğrulama maili gönderdik e-posta adresinize giderek hesabınızı doğrulayın."
                    ], 422);
                }
            }else {
                return Response::json([
                    "errorType" => "error",
                    "errorIcon" => "ShiledX",
                    "errorTitle" => "Hata!!",
                    "errorMessage" => "Bu e-posta adresine ait kullanıcı bulunamadı."
                ], 422);
            }


        }catch (Exception $exception) {
            Log::info("Register: ".$exception);
            return Response::json([
                "errorType" => "Fatal Error",
                "errorIcon" => "ShieldX",
                "errorTitle" => "Hata!",
                "errorMessage" => "Beklenmedik bir hata oluştu."
            ], 422);
        }
    }

    public function sendVerifyAccount($thisUser, $thisToken) {
        Mail::to($thisUser['email'])->send(new VerifiedAccount($thisUser, $thisToken));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
