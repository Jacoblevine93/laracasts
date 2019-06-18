<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{

    public function __construct()
    {
  //      $this->middleware('auth');
    }
    public function index()
    {

      $projects = Project::where('owner_id', auth()->id())->get(); //select * from projects where owner_id =4

      // -- new code $projects = auth()->user()->projects;

      //return view('projects.index', compact('projects'));

      return view('projects.index', [
        'projects' => auth()->user()->projects
      ]);



    }

    public function create()
    {

      return view('projects.create');
    }

    public function show(Project $project)
    {

        // abort_if()
        // abort_unless()
        // $this->authorize('update', $project);
        //abort_unless(\Gate::allows('update', $project), 403);

      //  $this->authorize('update', $project);

      return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {

      return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

    //  $this->authorize('update', $project);

      $project->title = request('title');
      $project->description = request('description');

      $project->save();

      //$project->update(request(['title', 'description']))

      return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
      $project->delete();

      return redirect('/projects');
    }

    public function store()
    {

      $attributes = (request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'description' => ['required', 'min:3', 'max:255'],
      ]));

      //$attributes = $this->validateProject();

      $attributes['owner_id'] = auth()->id();

      Project::create($attributes);

      Mail::($project->$owner->$email)->send(
        new ProjectCreated($project)
      );

      return redirect('/projects');
    }

    public function validateProject()
    {

      return request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'description' => ['required', 'min:3', 'max:255'],
      ]));

    }

}
