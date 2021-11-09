<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserCreate;

class UserController extends Controller
{   

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'users' => $this->userService->getAll()], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Something went wrong'], 500);
        }
    }
    
    public function create(UserCreate $request){
        return reponse()->json(['error' => false, 'code' => 'ok', 'user' => $this->userService->create()]);
    }

}
