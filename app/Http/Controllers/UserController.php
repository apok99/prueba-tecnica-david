<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserCreate;
use App\Http\Requests\UserUpdate;
use App\Http\Requests\UserDelete;

class UserController extends Controller
{   

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'users' => $this->userService->getAll()], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorGetting', 'message' => $e->getMessage()], 500);
        }
    }

 
    public function store(UserCreate $request){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'user' => $this->userService->create($request)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorCreate', 'message' => $e->getMessage() ], 500);
        }
    }

    public function update(UserUpdate $request){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'updated' => $this->userService->update($request)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorUpdate', 'message' => $e->getMessage() ], 500);
        }
    }

    public function destroy(UserDelete $request){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'deleted' => $this->userService->delete($request)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorDelete', 'message' => $e->getMessage() ], 500);
        }
    }

    public function show(Request $request, $userId){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'user' => $this->userService->getUser($userId)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorGettingUser', 'message' => $e->getMessage()], 500);
        }
    }

}
