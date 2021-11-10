<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Carbon;

class UserRepository{

    public function getAll(){
        return User::where('deletedAt', null)->get();
    }

    public function create($user){
        try {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->createdAt = now();
            $newUser->updatedAt = now();
            $newUser->deletedAt = null;
            $newUser->save();
            return $user; 
        } catch (\Throwable $th) {
            throw new \Exception("Something went wrong on creating an user.");
        }
   
    }

    public function update($user){
        try {
            return User::where('id', $user->id)->update(array_merge((Array) $user),['updatedAt' => now()]);
        } catch (\Throwable $th) {
            throw new \Exception("Something went wrong on creating an user.");
        }
    }

    public function delete($user){
        try {
            User::find($user->id)->delete();
            return true;
        } catch (\Throwable $th) {
            throw new \Exception("Something went wrong on deleting an user.");
        }   
    }

    public function getUser($id){
        try {
            return User::where('deletedAt', null)->where('id', $id)->first();
        } catch (\Throwable $th) {
            throw new \Exception("Something went wrong on getting an user.");
        }
    }

}