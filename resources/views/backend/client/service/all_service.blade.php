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
    background-color: aliceblue !important;
    color: black !important;
  }
  .pagination {
    --bs-pagination-disabled-bg: aliceblue;
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
  /* .form-control:focus, .form-control:hover, .form-control:active ,.form-control:checked , .form-control:click{
    -webkit-box-shadow: 0 0 0 30px aliceblue !important;
    -webkit-text-fill-color: black !important;
  } */
</style> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content"style="background-color: aliceblue;">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.services')}}" class="btn btn-primary"><i class="btn-icon-prepend" data-feather="plus"></i>Add Service</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Service All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th style="color: gray;">S1</th>
            <th style="color: gray;">Name</th>
            <th style="color: gray;">Description</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $services as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name}}</td>
                <td style="color: black;">{{ $item->description}}</td>
                <td>
                    <a href="{{ route('edit.services',$item->id)}}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                    <a href="{{ route('delete.services',$item->id)}}" id="delete" class="btn btn-inverse-danger" title="Delete"><i data-feather="trash-2"></i></a>
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
