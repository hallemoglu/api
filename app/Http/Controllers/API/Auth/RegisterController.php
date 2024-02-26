<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use App\Mail\VerifiedAccount;

class RegisterController extends Controller
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
            $user = User::where("email", $request->email)->first();
            if($user !== null) {
                if($user->email_verified_at === null) {
                    if(!$user->delete()) {
                        return Response::json([
                            "errorType" => "error",
                            "errorIcon" => "ShieldX",
                            "errorTitle" => "Başarısız",
                            "errorMessage" => "Yeni kullanıcı eklenirken bir hata oluştur. Daha sonra tekrar deneyin."
                        ], 422);
                    }
                }
            }

            $validator = Validator::make($request->all(), [
                "firstName" => "required",
                "lastName" => "required",
                "email" => "required|email|unique:users",
                "password" => "required|min:6|max:24",
                "passwordConfirm" => "required|min:6|max:24|same:password",
                "contract" => "accepted"
            ]);

            if ($validator->fails()) {
                return Response::json([
                    "validatorErrors" => $validator->errors()
                ], 422);
            }

            $token = Str::random(255);

            while (User::where('email_verified_token', $token)->exists()) {
                $token = Str::random(255);
            }

            $user = new User();
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->email_verified_token =  $token;

            if($user->save()) {
                $user = User::where("email", $request->email)->first();
                if($user) {
                    $userToken = $user->email_verified_token;
                    $this->sendVerifyAccount($user, $userToken);
                    return Response::json([
                        "successType" => "success",
                        "successIcon" => "ShieldCheck",
                        "successTitle" => "Başarılı",
                        "successMessage" => "Size bir mail gönderdik! E-Posta adresinize giderek hesabınızı doğrulayabilirsiniz."
                    ], 200);
                }else {
                    return Response::json([
                        "errorType" => "error",
                        "errorIcon" => "ShieldX",
                        "errorTitle" => "Başarısız",
                        "errorMessage" => "Yeni kullanıcı eklenirken bir hata oluştur. Daha sonra tekrar deneyin."
                    ], 422);
                }
            }
            return Response::json([
                "errorType" => "error",
                "errorIcon" => "ShieldX",
                "errorTitle" => "Başarısız",
                "errorMessage" => "Yeni kullanıcı eklenirken bir hata oluştur. Daha sonra tekrar deneyin."
            ], 422);
        }catch(Exception $exception) {
            Log::info("Register: ".$exception);
            return Response::json([
                "fatalErrorType" => "Fatal Error",
                "fatalErrorIcon" => "ShieldX",
                "fatalErrorTitle" => "Hata!",
                "fatalErrorMessage" => "Beklenmedik bir hata oluştu."
            ], 422);
        }
    }

    public function generateUniqueToken() {



    }

    /**
     *  Mail Function
     */

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
