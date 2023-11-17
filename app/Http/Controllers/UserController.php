<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDomicilio;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    public function get(){
        try {
            $users =  User::with('userDomicilio')->orderBy('id')->get();

            $mappedcollection = $users->map(function($user, $key) {		
                $edad = Carbon::parse($user->fecha_nacimento->format('d-m-Y'))->age;							
            return [
                    'id' => $user->id,
                    'name' => $user->name,
                    "email" => $user->email,
                    "email_verified_at" => $user->email_verified_at,
                    "created_at" => $user->created_at,
                    "updated_at" => $user->updated_at,
                    "fecha_nacimento" => $user->fecha_nacimento,
                    "user_domicilio" => $user->userDomicilio,
                    "edad" => $edad
                ];
            });
            return response()->json($mappedcollection, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }

    }
}
