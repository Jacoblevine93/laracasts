@extends('layout')

@section('content')
    <h1 class="title">Projects</h1>

    @foreach ($projects as $project)
      <ul>
          <a href="/projects/{{$project->id}}">
            {{$project->title}}
          </a>
      </ul>
    @endforeach
    <a href="/projects/create"><button style="margin-top:10px;" type="submit">Create</button></a>
@endsection
