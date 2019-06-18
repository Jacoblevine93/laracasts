@extends('layout')

@section('content')
  <h1 class="title">Edit Project</h1>

  <form method="POST" action="/projects/{{ $project->id}}">
    @method('PATCH')
    @csrf
    <div class="field">
      <label class="label" for="title">Title</label>
      <div class="control">
        <input type="text" class="input"  name="title" value="{{ $project->title }}" required>
      </div>
    </div>
    <div class="field">
      <label class="label" for="description" required>Description</label>
        <div class="control">
          <textarea name="description" class="textarea">{{ $project->description }}</textarea>
        </div>
    </div>
    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Update Project</button>
      </div>
    </div>
  </form>

  @include('errors')

@endsection('content')
