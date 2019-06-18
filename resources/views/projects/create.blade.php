@extends('layout')

@section('content')
      <h1 class="title">Create A New Project</h1>

      <form method="POST" action="/projects">
        @csrf
        <div class="field">
          <label class="label" for="title">Project Title</label>
          <div class="control">
            <input type="text" class="input {{$errors->has('title') ? 'is-danger' : ''}}" name="title" value="{{ old('title') }}" required>
          </div>
        </div>
        <div class="field">
          <label class="label" for="description">Project Description</label>
          <div class="control">
          <textarea name="description" class="textarea {{$errors->has('title') ? 'is-danger' : ''}}" value="{{ old('description') }}" required></textarea>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <button type="submit" class="button is-link">Create Project</button>
          </div>
        </div>
        @if ($errors->any())
          <div class="notification is-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      </form>
@endsection('content')
