@extends('layouts.app')

@section('content')
    <div class="my-container">

        <div class="my-card">

            <div class="my-row heading">
                <img class="project-thumb" src="/images/default-project.png" alt="computer-thumb">
                @if ($project->type)
                <div><span class="badge text-bg-info">{{$project->type->name}}</span></div>
                @endif

                @if ($project->client_name)
                <div><strong>Client:</strong> {{$project->client_name}}</div>
                @endif
            </div>

            <div class="my-row details">
                <div>
                    Project Date: {{$project->project_date}}
                </div>

                <div>
                    <a class="btn btn-sm btn-primary" href="{{$project->project_url}}">Project Link</a>
                </div>
            </div>

            <div class="my-row">
                <div class="my-title">
                    {{$project->title}}
                </div>
            </div>

            <div class="my-row">
                <div class="my-desc">
                    {{$project->description}}
                </div>
            </div>

            <div class="my-row edit">

                <a href="{{route('projects.edit', $project)}}" class="btn btn-sm btn-warning">Edit Project</a>

                @if($project->trashed())
                    <form action="{{ route('projects.restore', $project) }}" method="POST">
                    @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif

            </div>

            <div class="my-row mt-3">
                <form action="{{route('projects.destroy', $project)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-sm btn-danger" type="submit" value='Delete'>
                </form>
            </div>
            
        </div>

    </div>

    <div class="container pt-4">
        
        <h3 class="mb-3">Related Works:</h3>

        @if($project->type)

        <ul class="list-group">

            @foreach($project->type->projects as $work_type)

                <li class="list-group-item">

                    <a href="{{ route('projects.show',$work_type)}}">

                        {{ $work_type->title }}

                    </a>

                </li>

            @endforeach

        </ul>

        @else
            <p>No Related works found</p>
        @endif
    </div>
@endsection