<?php

namespace App\Services;

use App\Repositories\WorkEntryRepository;

class WorkEntryService {

    public function __construct(WorkEntryRepository $workEntryRepository){
        $this->workEntryRepository = $workEntryRepository;
    }   

    public function getAll(){
        return $this->workEntryRepository->getAll();
    }

    public function create($request){
        return $this->workEntryRepository->create((object) $request->workEntry);
    }

    public function update($request){
        return $this->workEntryRepository->update((object) $request->workEntry);
    }

    public function delete($request){
        return $this->workEntryRepository->delete((object) $request->workEntry);
    }

    public function getWorkEntry($id){
        return $this->workEntryRepository->find($id);
    }

    public function getWorkEntriesByUser($userId){
        return $this->workEntryRepository->findByUserId($userId);
    }

}