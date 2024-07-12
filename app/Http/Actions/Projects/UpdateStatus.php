<?php

namespace App\Http\Actions\Projects;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Project;
use App\Models\ProjectShots;

class UpdateStatus {

    public function handle( UpdateStatusRequest $request ) {


        $project = Project::where('id', $request->project_id)->first();

        $project->update([
            'status' => $request->status
        ]);
        
        if($request->status == "rejected") return back()->with(["error" => "Project Rejected"]);

        return back()->with(["success" => "Project Approved Successful"]);
    }
}