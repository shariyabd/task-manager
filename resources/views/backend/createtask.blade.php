@extends('backend.layout.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body p-2">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Create Task</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                     <form action="">
                        <input class="mt-2 form-control" type="text" name="title" id="title" placeholder="Task Title: ">

                        <textarea class="mt-2 form-control" name="" id="" cols="30" rows="10">Task Description</textarea>
                        <select class="mt-2 form-control" name="" id="">
                            <option value="">Select Assignee Name</option>
                            <option value="">Shariya</option>
                        </select>
                        <button class="mt-2 btn btn-primary">Add</button>
                     </form>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head --><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection