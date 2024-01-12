@extends('backend.layout.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body p-2">
                <div class="nk-block-head nk-block-head-sm card p-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Create Task Category</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content card-body pt-5">
                     <form action="">
                        <div class="form-group">
                            <label for="name">Category Name :</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Category Name: ">
                        </div>
                        <div class="form-group">
                            <label for="slug">Category Slug <span>(Optional)</span> :</label>
                            <input class="form-control" type="text" name="slug" id="slug" placeholder="Category Slug" >
                        </div>
                        <button class="btn btn-primary">Save Category</button>
                     </form>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head --><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection