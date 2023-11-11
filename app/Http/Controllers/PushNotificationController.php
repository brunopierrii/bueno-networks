<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PushNotificationController extends Controller
{
    
    public function updateDeviceToken(Request $request)
    {
        if(Auth::check()){
            
            $user = User::find(auth()->user()->id);
            $user->device_token = $request->json()->all()['token'];
            $user->save();
    
            return json_encode(['message' => 'token saved!']);
        }
    }
}
