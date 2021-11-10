<?php
namespace App\Repositories;

use App\Models\WorkEntry;
use Illuminate\Support\Carbon;
class WorkEntryRepository{

    public function getAll(){
        try {
            return WorkEntry::with('user')->where('deletedAt', null)->get();
        } catch (\Exception $e) {
            return throw new \Exception("Something went wrong when retrieving all work entries.");
        }
       
    }

    public function create($workEntry){
        try {
        
            $work = new WorkEntry;
            $work->userId = ((object)$workEntry->user)->id;
            $work->startDate = $workEntry->startDate;
            $work->endDate = $workEntry->endDate;
            $work->createdAt = now();
            $work->updatedAt = now();
            $work->deletedAt = null;
            $work->save();
            return $work;
        } catch (\Exception $e) {
            return throw new \Exception("Something went wrong when retrieving all work entries.");
        }
    }

    public function update($workEntry){
        try {
            WorkEntry::where('id', $workEntry->id)->update(array_merge((Array) $workEntry, ['updatedAt' => now()]));
            return true;
        } catch (\Exception $th) {
            return throw new \Exception("Something went wrong on updating a work entry.");
        }
    }

    public function delete($workEntry){
        try {
            WorkEntry::find($workEntry->id)
                                    ->delete();
            return true;
        } catch (\Throwable $th) {
            return throw new \Exception("Something went wrong when deleting a work entry.");
        }
    }

    public function find(int $id){
        try {
            return  WorkEntry::with('user')->where('id', $id)->where('deletedAt', null)->first();
        } catch (\Exception $th) {
           return throw new \Exception("Something went wrong when finding a work entry.");
        }
        
    }

    public function findByUserId(int $userId){
        try {
            return  WorkEntry::with('user')->where('userId', $userId)->where('deletedAt', null)->get();
        } catch (\Exception $th) {
           return throw new \Exception("Something went wrong when finding work entries.");
        }
        
    }

}