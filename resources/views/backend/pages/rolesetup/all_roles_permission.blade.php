@extends('admin.admin_dashboard')
@section('admin')
<style>
  .page-breadcrumb .breadcrumb {
    background: aliceblue;
}
.form-select {
    background-color: aliceblue;
  }
  .form-control{
    background-color: aliceblue;
  }
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
  }
</style>

<div class="page-content" style="background-color: aliceblue;">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.role')}}" class="btn btn-primary"><i class="btn-icon-prepend" data-feather="plus"></i>Add Role </a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: gray;">All Role Permission</h6>
    <div class="table-responsive">
      <table  class="table">
        <thead>
          <tr>
            <th style="color: gray;">S1</th>
            <th style="color: gray;">Role Name</th>
            <th style="color: gray;">Permission Name</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $roles as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name}}</td>
                <td>
                @foreach ($item->permissions as $perm)
                <span class="badge bg-danger">{{ $perm->name }}</span>
                @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.edit.role',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                    <a href="{{ route('admin.delete.role',$item->id)}}" id="delete" class="btn btn-inverse-danger">Delete</a>
                </td>

              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>
@endsection
