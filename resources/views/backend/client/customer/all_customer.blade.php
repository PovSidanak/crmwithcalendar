@extends('admin.admin_dashboard')
@section('admin')
<style>
  .page-breadcrumb .breadcrumb {
    background: aliceblue;
}
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
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
  input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
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
            <a href="{{ route('add.customers')}}" class="btn btn-primary"><i class="btn-icon-prepend" data-feather="plus"></i>Add Customer</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card"  style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Customer All</h6>
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
                    <a href="{{ route('edit.customers',$item->id)}}" class="btn btn-outline-warning" title="Edit"><i data-feather="edit"></i></a>
                    <a href="{{ route('delete.customers',$item->id)}}" id="delete" class="btn btn-outline-danger" title="Delete"><i data-feather="trash-2"></i></a>
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
