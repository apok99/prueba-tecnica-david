<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService {

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function getAll(){
        return $this->userRepository->getAll();
    }

    public function create($request){
        return $this->userRepository->create((object) $request->user);
    }

    public function update($request) { 
        return $this->userRepository->update((object) $request->user);
    }

    public function delete($request){
        return $this->userRepository->delete((object) $request->user);
    }

    public function getUser($id){
        return $this->userRepository->getUser($id);
    }

}