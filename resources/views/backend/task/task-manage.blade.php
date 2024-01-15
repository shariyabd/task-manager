@extends('backend.layout.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body p-2">
                <div class="nk-block-head nk-block-head-sm card p-2">
                  <div class="d-flex justify-content-between">
                    <h4> Task List</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
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
                        <th>Priority</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Assignee</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Due Time</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($tasks as $index=>$task)
                       <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$task->title}}</td>
                        <td>{{$task->deadline_date}}</td>
                        <td>{{$task->deadline_time}}</td>
                        <td>{{$task->priority}}</td>
                        <td>{{$task->category->name}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->assignee}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>{{$task->updated_at}}</td>
                        <td>On Quaue</td>
                        <td>23</td>
                        <td>Edit</td>
                       </tr>
                       @endforeach
                    </tbody>
                </table><!-- .nk-block-head --><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@include('backend.category.category-modal')
@endsection