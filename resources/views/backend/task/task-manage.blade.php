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
                        <th>Name : </th>
                        <th>Description :</th>
                        <th>Due Date :</th>
                        <th>Priority</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Technology</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus sit nemo aperiam alias tempore molestiae vitae soluta aliquid eveniet hic!</td>
                            <td>12/23/12</td>
                            <td>Urgent</td>
                            <td>Development</td>
                            <td>Backlog</td>
                            <td><a href="" class="btn btn-sm btn-primary">View</a></td>
                        </tr>
                      
                    </tbody>
                </table><!-- .nk-block-head --><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@include('backend.category.category-modal')
@endsection