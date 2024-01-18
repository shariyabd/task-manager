@extends('backend.layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body p-2">
                    <div class="nk-block-head nk-block-head-sm card p-2">
                        <div class="d-flex justify-content-between">
                            <h4> Task List</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
                                Add New
                            </button>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Title : </th>
                            <th>Deadline Date :</th>
                            <th>Deadline Time :</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $index => $task)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->deadline_date }}</td>
                                    <td>{{ $task->deadline_time }}</td>
                                    <td>{{ $task->priority }}</td>
                                    <td>
                                        <button onclick="taskDetails({{ $task->id }})"
                                            class="btn btn-primary details-btn">Details</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table><!-- .nk-block-head --><!-- .nk-block -->
                </div>
            </div>
        </div>
        @include('backend.task.task-modal')
        @include('backend.task.task-details-modal')
    </div>
@endsection


@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function taskDetails(id) {
            $.ajax({
                url: '{{ url('task-show') }}/' + id,
                type: 'GET',
                success: function (response) {
                    var data = response.data;
                    var statusText = (data.status == null) ? 'Pending' : 'Publish';

                    var detailsData = `<tbody>
                <tr>
                    <th>Id</th>
                    <td>${data.id}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>${data.title}</td>
                </tr>
                <tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                    <th>Deadline Date</th>
                    <td>${data.deadline_date}</td>
                </tr>
                <tr>
                    <th>Deadline Time</th>
                    <td>${data.deadline_time}</td>
                </tr>
                <tr>
                    <th>Priority</th>
                    <td>${data.priority}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>${data.description}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>${data.category.name}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>${statusText}</td>
                </tr>
                <tr>
                    <th>Assignee</th>
                    <td>${data.assignee}</td>
                </tr> <tr>
                    <th>Due Time</th>
                    <td>${data.due_time}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>${formatDate(data.created_at)}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>${formatDate(data.updated_at)}</td>
                </tr>
            </tbody>`;

                    $('#detailsTable').html(detailsData);
                    $('#taskDetails').modal('show');
                },
                error: function (status, error) {
                    console.log(status);
                    console.log(error);
                }
            });
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const formattedDate = date.toISOString().split('T')[0];
            return formattedDate;
        }
    </script>
@endpush
