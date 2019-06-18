@extends('layout')

@section('content')
    <h1 style="text-align:center;" class="title">{{$project->title}}</h1>

    @can('update', $project)
      <a href="">Update</a>
    @endcan

    <div style="text-align:center;">{{$project->description}}</h1></div>
    <br />
    <div style="text-align:center;">
      <a href="/projects/{{$project->id}}/edit">Edit</a>
      <form method="POST" action="/projects/{{$project->id }}">
        @method('DELETE')
        @csrf
        <div class="field">
          <div style="text-align:center;" class="control">
            <button type="submit" value="{{$project->id }}">Delete</button>
          </div>
      </form>
    </div>
    @if ($project->tasks->count())
    <div class="box">
      @foreach ($project->tasks as $task)
      <div>
        <form method="POST" action="/completed-tasks/{{$task->id}}">
          @if ($task->completed)
            @method('DELETE')
          @endif
          @csrf
          <label class="checkbox {{$task->completed ? 'is-complete' : ''}}" for="completed">
            <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
            {{$task->description}}
          </label>
        </form>
      </div>
        @endforeach
    </div>
    @endif
    <form method="POST" action="/projects/{{$project->id}}/tasks" class="box">
      @csrf
      <div class="field">
        <label class="label" for="description">New Task</label>
        <div class="control">
            <input type="text" class="input" name="description" placeholder="New Task" required>
        </div>
      </div>
      <div class="field">
        <div class="control">
          <button type="submit" class="button is-link">Add Task</button>
        </div>
      </div>
      </div>
      @include('errors')
    </form>



    <br />
    <div style="text-align:center;"><a href="/projects">Index</a></div>
@endsection
