<?php

namespace App\Http\Controllers;

use App\Task; //what?
use App\Project;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {

      request()->validate([
        'description' => 'required'
      ]);

      $project->addTask(request('description'));

      return back();
    }

    public function complete($completed = true)
    {

      $this->update(compact('complete'));
      //this or update

    }
}
