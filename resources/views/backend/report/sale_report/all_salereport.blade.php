
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
  input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
}
label > span {
  color: red;
  margin-left: 3px;
}
.select2-hidden-accessible{
  background-color: aliceblue !important;
}
.js-example-basic-single{
  color: black !important;
}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content"style="background-color: aliceblue;">

    <div>
        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">
           <i class="btn-icon-prepend" data-feather="plus"></i>Add Report
        </button>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card" style="background-color: aliceblue; border:none;">
  <div class="card-body">
    <h6 class="card-title" style="color: black;">Sale Report All</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th style="color: gray;">ID</th>
            <th style="color: gray;">Name Company</th>
            <th style="color: gray;">Start Date</th>
            <th style="color: gray;">End Date</th>
            <th style="color: gray;">Budget</th>
            <th style="color: gray;">Sale By</th>
            <th style="color: gray;">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $combine_array as $key => $item)
            <tr>
                <td style="color: black;">{{ $key+1}}</td>
                <td style="color: black;">{{ $item->name_customer}}</td>
                <td style="color: black;">{{ $item->date_of_project}}</td>
                <td style="color: black;">{{ $item->project_close_date}}</td>
                <td style="color: black;">USD {{ $item->project_size_budget}}</td>
                <td style="color: black;">{{ $item->name_user }}</td>
                <td>
                    <a href="{{ route('edit.salereports',$item->id)}}" class="btn btn-outline-warning" title="Edit"><i data-feather="edit"></i></a>
                    <a href="{{ route('delete.tickets',$item->id)}}" id="delete" class="btn btn-outline-danger" title="Delete"><i data-feather="trash-2"></i></a>
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


{{-- Create form --}}
<div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"  style="background-color: aliceblue;">
        <div class="modal-header">
          <h5 class="modal-title" id="varyingModalLabel"  style="color: black;">Add Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <form id="myForm" method="POST" action="{{ route('store.salereports')}}" class="forms-sample" >
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" style="color: gray;" class="form-label">Sale By <span>*</span></label>
                        <select name="users_id" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                        <option selected="" disabled="">Select Name</option>
                       @foreach ($users as $user)
                       <option value="{{ $user->id }}">{{ $user->name }} </option>
                       @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Person Name <span>*</span></label>
                        <input type="name" name="contact_person" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" style="color: gray;" class="form-label">Customer Name <span>*</span></label>
                        <select name="customers_id" style="background-color: aliceblue; color:black" class="form-select" id="exampleFormControlSelect1" required>
                        <option selected="" disabled="">Select Name</option>
                       @foreach ($customers as $customer)
                       <option value="{{ $customer->id }}">{{ $customer->name }} </option>
                       @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Date of Prospect <span>*</span></label>
                        <input type="date" name="date_of_project" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Project Name <span>*</span></label>
                        <input type="name" name="project_name" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Project Close Date <span>*</span></label>
                        <input type="date" name="project_close_date" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Summary of Engagment <span>*</span></label>
                        <input type="text" name="sum_engage_client" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Nose of Visit <span>*</span></label>
                        <input type="number" name="nos_of_visit" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Nos of Call <span>*</span></label>
                        <input type="number" name="nos_of_call" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1" class="form-label" style="color: gray;">Project Size Budget $ <span>*</span></label>
                        <input type="dollar" name="project_size_budget" class="form-control" style="color: black;background-color:aliceblue" required>
                    </div>
                </div>
                <div class="mb-3 form-group" >
                    <label for="exampleInputEmail1" class="form-label" style="color: gray;">Note <span>*</span></label>
                    <input type="text" name="note" class="form-control" style="color: black;background-color:aliceblue" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Save</button>
              </form>

        </div>

      </div>
    </div>
  </div>
@endsection
