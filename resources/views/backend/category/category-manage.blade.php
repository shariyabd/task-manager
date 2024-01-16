@extends('backend.layout.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
         <div class="col-md-12">
            <div class="nk-content-body p-2">
                <div class="nk-block-head nk-block-head-sm card p-2">
                  <div class="d-flex justify-content-between">
                    <h4>Mange Category</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                        Add New
                    </button>
                  </div>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                        <th>Id</th>
                        <th>Name : </th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table><!-- .nk-block-head --><!-- .nk-block -->
            </div>
         </div>
        </div>
    </div>
</div>
@include('backend.category.category-modal')
@endsection
@push('js')
<script type="text/javascript">
    $(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('category.manage') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      
    });
  </script>
@endpush