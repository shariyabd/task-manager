@extends('backend.layout.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body p-2">
                <div class="nk-block-head nk-block-head-sm card p-2">
                  <div class="d-flex justify-content-between">
                    <h4>Mange Task</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                        Add New
                    </button>
                  </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Name : </th>
                        <th>Slug :</th>
                        <th>Status :</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Technology</td>
                            <td>technology</td>
                            <td>Active</td>
                            <td><a href="" class="btn btn-sm btn-primary">View</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Technology</td>
                            <td>technology</td>
                            <td>Active</td>
                            <td><a href="" class="btn btn-sm btn-primary">View</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Technology</td>
                            <td>technology</td>
                            <td>Active</td>
                            <td><a href="" class="btn btn-sm btn-primary">View</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Technology</td>
                            <td>technology</td>
                            <td>Active</td>
                            <td><a href="" class="btn btn-sm btn-primary">View</a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Technology</td>
                            <td>technology</td>
                            <td>Active</td>
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