<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class VerifiedEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($token)
    {
        try {
            $user = User::where("email_verified_token", $token)->first();
            if($user) {
                if($user->email_verified_at === null) {
                    $user->email_verified_at = Carbon::now();
                    if($user->save()){
                        return Response::json([
                            "successType" => "success",
                            "successIcon" => "ShieldCheck",
                            "successTitle" => "Başarılı!",
                            "successMessage" => "Hesap başarıyla doğrulandı! Hemen giriş yapabilirsiniz."
                        ], 200);
                    }
                }
                else{
                    return Response::json([
                        "warningType" => "warning",
                        "warningIcon" => "ShieldAlert",
                        "warningTitle" => "Dikkat!",
                        "warningMessage" => "Bu hesap daha önce doğrulanmış! Giriş yapabilirsiniz."
                    ], 422);
                }
            }else {
                return Response::json([
                    "errorType" => "error",
                    "errorIcon" => "ShieldX",
                    "errorTitle" => "Hata!",
                    "errorMessage" => "Doğrulama kodu bulunamadı."
                ], 422);
            }
        }catch (Exception $exception) {
            Log::info("Verification Account: ".$exception);
            return Response::json([
                "errorType" => "fatalError",
                "errorIcon" => "ShieldX",
                "errorTitle" => "Hata!",
                "errorMessage" => "Beklenmedik bir hata oluştu. Lütfen daha sonra tekrar deneyin."
            ], 422);
        }
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
        //
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
