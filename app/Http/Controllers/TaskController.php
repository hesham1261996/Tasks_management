<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\Task;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class TaskController extends Controller
{
    public function store(project $project){
        $data = request()->validate([
            'body' => 'required'
        ]);
        $data['project_id'] = $project->id ;
        Task::create($data);
        return back();
    }
    public function update(Project $project , Task $task){
        
        $task->update([
            'status' => request()->has('status')
        ]);
        return back();
    }
    public function destroy(project $project ,  Task $task){
        $task->delete();

        return redirect("/projects/".$project->id);
    }
}
