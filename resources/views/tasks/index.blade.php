@extends('layouts.app')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tasks</h1>

    <div class="card shadow mb-4">

        <div class="card-body">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Add Task
            </a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Priority</th>
                            <th>Project</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->project->name ?? 'Not defined' }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>
                                    <a href="{{ route('task.edit',['task'=>$task]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('task.delete',['task'=>$task]) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No Data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Task</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('task.store') }}" method="post">
                        @csrf
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Task Name</span>
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p><strong style="color: red">{{ $message }}</strong></p>
                        @enderror
                        <br />
                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#addModal').modal('show');
            });
        </script>
    @endif
@endsection
