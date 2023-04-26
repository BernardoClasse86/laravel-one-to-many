@extends('layouts.app')

@section('content')
<div class="container pt-5">

    <div class="container">
        <h1>New Project</h1>
    </div>

    <div class="container">

        <form action="{{route('projects.store')}}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="title" class="col-form-label">Project Title</label>       
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                @error('title')
                    <div class="invalid-feedback mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="description" class="col-form-label">Project description</label>
                <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
    
            <div class="mb-3">
                <label for="project_url" class="col-form-label">Project URL</label>
                <input type="text" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" value="{{old('project_url')}}">
                @error('project_url')
                    <div class="invalid-feedback mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="project_date" class="col-form-label">Project Date</label>
                <input type="text" class="form-control @error('project_date') is-invalid @enderror" id="project_date" name="project_date" value="{{old('project_date')}}">
                @error('project_date')
                    <div class="invalid-feedback mt-2">{{$message}}</div>
                @enderror
            </div>
    
            <div class="mb-3">    
                <label for="client_name" class="col-form-label">Client Name</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{old('client_name')}}">
                @error('client_name')
                    <div class="invalid-feedback mt-2">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save new Project</button>

        </form>

    </div>

</div>
@endsection