@extends('layouts.app')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Task : {{ $task->name }}</h1>
    <div class="card shadow">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <form action="{{ route('task.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $task->id }}">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Task Name</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ $task->name }}">
                        @error('name')
                            <p><strong style="color: red">{{ $message }}</strong></p>
                        @enderror
                        <br />

                        <label for="project">Choose a Project (if needed):</label>
                        <select name="project_id" class="form-control">
                            <option value=""></option>
                            @foreach ($projects as $project)
                                <option
                                    value="{{ $project->id }}"{{ $project->id == $task->project_id ? 'selected' : '' }}>
                                    {{ $project->name }}</option>
                            @endforeach

                        </select>


                        <br />
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>

            @if ($task->project_id !== null)
                <div class="col-md-6">
                    <center>
                        <h4>Associated tasks with {{ $task->project->name }} :</h4>
                    </center>
                    <ul>
                        @foreach ($task->project->tasks as $taskproject)
                            <li><strong>{{ $taskproject->name }}</strong></li>
                        @endforeach
                    </ul>

                </div>
            @endif
        </div>
    </div>
@endsection
