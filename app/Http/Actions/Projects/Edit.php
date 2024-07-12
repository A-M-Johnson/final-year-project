<?php

namespace App\Http\Actions\Projects;
use App\Http\Requests\EditProjectRequest;
use App\Models\Project;
use App\Models\ProjectShots;

class Edit {

    public function handle( EditProjectRequest $request ) {

        $project = Project::where("id", $request->project_id)->first();

        $project_file = $request->file('project_file') ? $request->file('project_file')->store('project_files') : false;
        
        if($project_file) {
            $project->update([
                "project_file" => $project_file
            ]);
        }
        
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'supervisor_id' => $request->supervisor,
        ]);

        if($request->file('snapshots') and count($request->file('snapshots')) > 1) {
            
            ProjectShots::where('project_id', $project->id)->delete();

            foreach($request->file('snapshots') as $snapshot) {
                $path = $snapshot->store('shapshots');
    
                ProjectShots::create([
                    'image'      => $path,
                    'project_id' => $project->id,
                ]);
    
            }
        }


        return redirect('/student')->with(["success" => "Project Edit Successful"]);
    }
}