<?php

namespace App\Http\Controllers;

use App\Http\Actions\Projects\UpdateStatus;
use App\Http\Actions\Projects\Upload;
use App\Http\Actions\Projects\Edit;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Requests\UploadProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class ProjectController extends Controller
{
    //

    public function uploadProject(Upload $action, UploadProjectRequest $request) {
        return $action->handle($request);
    }

    public function displayUploadForm() {

        return view('html.upload', [
            'supervisors' => Auth::user()->teachers(),
        ]);
    }

    public function studentProjects() {
        return view('html.student', [
            'projects' => Project::where("user_id", Auth::user()->id)->paginate(),
        ]);
    }

    public function lecturerProjects() {

        $projects = Project::where("supervisor_id", Auth::user()->id)->with('student')->paginate();
        // dd($projects[0]);
        return view('html.dashboard', [
            'projects' => $projects,
        ]);
    }

    public function viewProjectForm(Project $project) {

        if($project->supervisor_id !== Auth::user()->id) return back();

        // dd($project->shots);

        return view('html.project', [
            'project' => $project,
            'supervisors' => Auth::user()->teachers(),
        ]);
    }

    public function editProjectForm(Project $project) {

        if($project->user_id !== Auth::user()->id) return back();

        return view('html.edit', [
            'project' => $project,
            'supervisors' => Auth::user()->teachers(),
        ]);
    }

    public function editProject(Edit $action, EditProjectRequest $request) {
        return $action->handle($request);
    }

    public function changeProjectState(UpdateStatus $action, UpdateStatusRequest $request) {
        return $action->handle($request);
    }
}
