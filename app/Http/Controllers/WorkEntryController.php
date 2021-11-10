<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WorkEntryService;
use App\Http\Requests\WorkEntryCreate;
use App\Http\Requests\WorkEntryUpdate;
use App\Http\Requests\WorkEntryDelete;

class WorkEntryController extends Controller
{
    public function __construct(WorkEntryService $workEntryService){
        $this->workEntryService = $workEntryService;
    }

    public function index(){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'workentries' => $this->workEntryService->getAll()], 200);
        } catch (\Exception $e) {
           return response()->json(['error' => true, 'code' => 'errorGettingWorkEntries', 'message' => $e->getMessage()], 500);
        }
    }
    
    public function store(WorkEntryCreate $request){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'workentry' => $this->workEntryService->create($request)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorStorignWorkEntries', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(WorkEntryUpdate $request){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'updated' => $this->workEntryService->update($request)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorUpdatingWork', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(WorkEntryDelete $request){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'destroyed' => $this->workEntryService->delete($request)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorDeletingWork', 'message' => $e->getMessage()], 500);
        }
    }

    public function show(Request $request, $id){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'workEntry' => $this->workEntryService->getWorkEntry($id)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorGettingEntry', 'message' => $e->getMessage()], 500);
        }
    }

    public function getByUserId(Request $request, $userId){
        try {
            return response()->json(['error' => false, 'code' => 'ok', 'workEntries' => $this->workEntryService->getWorkEntriesByUser($userId)], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'code' => 'errorGettingEntries', 'message' => $e->getMessage()], 500);
        }
    }

}
