@extends('admin.admin_dashboard')
@section('admin')
<style>
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
  }
  .page-breadcrumb .breadcrumb {
    background: aliceblue;
  }
  .form-select {
    background-color: aliceblue;
  }
  .form-control{
    background-color: aliceblue !important;
    color: black !important;
  }
  .dataTables_length{
    color: black;
  }
  .dataTables_info{
    color: black;
  }
  .dataTables_length select {
    color: black;}
    .page-link{
    background-color: white;
  }
  .page-link:hover{
    background-color: aliceblue;
  }


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content"  style="background-color: aliceblue;">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.leads')}}" class="btn btn-primary"><i class="btn-icon-prepend" data-feather="plus"></i>Add Lead</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card"  style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Lead All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th style="color: gray;">ID</th>
            <th style="color: gray;">Name</th>
            <th style="color: gray;">Email</th>
            <th style="color: gray;">Phone Number</th>
            <th style="color: gray;">Sold by</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $combine_array as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name}}</td>
                <td style="color: black;">{{ $item->email}}</td>
                <td style="color: black;">{{ $item->phone}}</td>
                <td style="color: black;">{{ $item->name_user }}</td>
                <td>
                    <a href="" class="btn btn-inverse-success" title="convert"><i data-feather="share"></i></a>
                    <a href="{{ route('edit.leads',$item->id)}}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                    <a href="{{ route('delete.leads',$item->id)}}" id="delete" class="btn btn-inverse-danger" title="Delete"><i data-feather="trash-2"></i></a>
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
