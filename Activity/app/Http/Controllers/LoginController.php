<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Services\Utility\MyLogger2;

class LoginController extends Controller
{
    
    public function index(Request $request)
    {
        Log::info("Entering LoginController::index()");
        
        try {
            
            $username = $request->input('username');
            $password = $request->input('password');
            
            MyLogger2::info("Parameters are: ",array("username" => $username, "password" => $password));
            $user = new UserModel(- 1, $username, $password);
            
            $service = new SecurityService();
            $status = $service->login($user);
            
            if ($status) {
                $data = [
                    'model' => $user
                ];
                return view('loginPassed')->with($data);
                MyLogger2::info("Exit LoginController::index() with login passing");
            } else {
                return view('loginFailed');
                MyLogger2::info("Exit LoginController::index() with login failing");
            }
        } catch (Exception $e) {
            
            MyLogger2::error("Exception LoginController::index()" . $e->getMessage());
            return view("loginFailed")->with($data);
        }
    }
}