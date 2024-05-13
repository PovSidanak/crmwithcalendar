@extends('admin.admin_dashboard')
@section('admin')
<style>
  label > span {
  color: red;
  margin-left: 3px;
}
input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px aliceblue inset;
    -webkit-text-fill-color: black;
}
.select2-hidden-accessible{
  background-color: aliceblue !important;
}
.js-example-basic-single{
  color: black !important;
}

</style>
<div class="page-content" style="background-color: aliceblue;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="row profile-body">
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card" style="background-color: aliceblue; border:none">
                <div class="card-body">
                    <h6 class="card-title" style="color: black;">Edit ATM</h6>

                        <form id="myForm" method="POST" action="{{ route('update.atms',$atms->id)}}" class="forms-sample" >
                          @csrf
                            <div class="mb-3 form-group" >
                                <label for="exampleInputEmail1" class="form-label" style="color: gray;">Company Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" style="color: black;background-color:aliceblue"  value="{{$atms->name }}" required>
                            </div>
                            <div class="mb-3 form-group" >
                                <label  class="form-label" style="color: gray;">ATM Model <span>*</span></label>
                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="model" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"  value="{{ $atms->model  }}" required>
                                  <option value="Model A" data-select2-id="3">Model A</option>
                                  <option value="Model B" data-select2-id="13">Model B</option>
                                  <option value="Model C" data-select2-id="14">Model C</option>
                                  <option value="Model D" data-select2-id="15">Model D</option>
                                  <option value="Model E" data-select2-id="16">Model E</option>
                              </select>
                            </div>
                            <div class="mb-3 form-group" >
                              <label  class="form-label" style="color: gray;">ATM Classification <span>*</span></label>
                              <select class="js-example-basic-single form-select select2-hidden-accessible" name="classification" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"  value="{{$atms->classification  }}" required>
                                  <option value="Yellow Label" data-select2-id="3">Yellow Label</option>
                                  <option value="White Label" data-select2-id="13">White Label</option>
                                  <option value="Green Label" data-select2-id="14">Green Label</option>
                                  <option value="Pink Label" data-select2-id="15">Pink Label</option>
                                  <option value="Brown Label" data-select2-id="16">Brown Label</option>
                            </select>
                          </div>
                          <div class="mb-3 form-group" >
                              <label  class="form-label" style="color: gray;">ATM Type <span>*</span></label>
                              <select class="js-example-basic-single form-select select2-hidden-accessible" name="type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"  value="{{$atms->type}}" required>
                                <option value="Type 1" data-select2-id="3">Type 1</option>
                                <option value="Type2" data-select2-id="13">Type2</option>
                            </select>
                          </div>
                          <div class="mb-3 form-group" >
                              <label  class="form-label" style="color: gray;">ATM Category <span>*</span></label>
                              <select class="js-example-basic-single form-select select2-hidden-accessible" name="category" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"  value="{{ $atms->category}}" required>
                                <option value="Category A" data-select2-id="3">Category A</option>
                                <option value="Category B" data-select2-id="13">Category B</option>
                                <option value="Category C" data-select2-id="14">Category C</option>
                                <option value="Category D" data-select2-id="15">Category D</option>
                                <option value="Category E" data-select2-id="16">Category E</option>
                              </select>
                          </div>
                          <div class="mb-3 form-group" >
                              <label for="exampleInputEmail1" class="form-label" style="color: gray;">Address <span>*</span></label>
                              <input type="text" name="address" class="form-control" style="color: black;background-color:aliceblue" name="address" value="{{ $atms->address  }}" required>
                          </div>
                          <div class="mb-3 form-group" >
                              <label  class="form-label" style="color: gray;">City <span>*</span></label>
                              <select class="js-example-basic-single form-select select2-hidden-accessible" name="city" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"  value="{{$atms->city  }}" required>
                                <option value="Phnom Penh" data-select2-id="3">Phnom Penh</option>
                                <option value="Kratie" data-select2-id="13">Kratie</option>
                                <option value="Banteay Meanchey" data-select2-id="14">Banteay Meanchey</option>
                                <option value="Battambang" data-select2-id="15">Battambang</option>
                                <option value="Kampong Cham" data-select2-id="16">Kampong Cham</option>
                                <option value="Kampong Chhnang" data-select2-id="16">Kampong Chhnang</option>
                                <option value="Kampong Speu" data-select2-id="16">Kampong Speu</option>
                                <option value="Kampong Thom" data-select2-id="16">Kampong Thom</option>
                                <option value="Kampot" data-select2-id="16">Kampot</option>
                                <option value="Kandal" data-select2-id="16">Kandal</option>
                                <option value="Kep" data-select2-id="16">Kep</option>
                                <option value="Koh Kong" data-select2-id="16">Koh Kong</option>
                                <option value="Mondulkiri" data-select2-id="16">Mondulkiri</option>
                                <option value="Oddar Meanchhey" data-select2-id="16">Oddar Meanchhey</option>
                                <option value="Paillin" data-select2-id="16">Paillin</option>
                                <option value="Preah Sihanouk" data-select2-id="16">Preah Sihanouk</option>
                                <option value="Preah Vihea" data-select2-id="16">Preah Vihea</option>
                                <option value="Prey Veng" data-select2-id="16">Prey Veng</option>
                                <option value="Pursat" data-select2-id="16">Pursat</option>
                                <option value="Ratanak Kiri" data-select2-id="16">Ratanak Kiri</option>
                                <option value="Stung Treng" data-select2-id="16">Stung Treng</option>
                                <option value="Svay Rieng" data-select2-id="16">Svay Rieng</option>
                                <option value="Takeo" data-select2-id="16">Takeo</option>
                                <option value="Tboung Khmum" data-select2-id="16">Tboung Khmum</option>
                              </select>
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
