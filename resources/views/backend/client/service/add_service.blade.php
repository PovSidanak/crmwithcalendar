@extends('admin.admin_dashboard')
@section('admin')
<style>
    input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
}
label > span {
  color: red;
  margin-left: 3px;
}
</style>

<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body">
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Add Service</h6>

                        <form id="myForm" method="POST" action="{{ route('store.services')}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Service Name <span>*</span></label>
                                <input type="text" name="name" style="background-color: aliceblue; color:black" class="form-control" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" style="color: gray;" class="form-label">Service Description <span>*</span></label>
                                <input type="text" name="description" style="background-color: aliceblue; color:black" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
