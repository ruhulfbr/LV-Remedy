@extends('template')
@section('main_content')

  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                
                <form class="form-horizontal" method="post" action="{{url('/customers/update')}}" enctype="multipart/form-data">
                  @csrf
                      <div class="card-body">
                        <h5 class="card-title">
                          <?php echo $title; ?>
                          <a href="{{URL::to('/customers')}}" class="btn btn-info float-right"><i class="fas fa-users"></i> Manage Customers</a>
                        </h5>
                      </div>
                      <div class="card-body border-top">
                        <div class="row">

                            <div class="col-md-12">
                                @if ($errors->any())
                                      <div class="alert alert-danger" role="alert">
                                          @foreach ($errors->all() as $error)
                                            {{ $error }}<br>
                                          @endforeach
                                      </div><br>
                                  @endif
                                  @if(Session::has('success_msg'))
                                    <div class="alert alert-success">{{Session::get('success_msg')}}</div><br>
                                  @endif
                                  @if(Session::has('error_msg'))
                                    <div class="alert alert-danger">{{Session::get('error_msg')}}</div><br>
                                  @endif
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Name <span class="text-danger">*</span></label>
                                    <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Enter full name" value="{{$customer->full_name ? $customer->full_name : ''}}" required>
                                </div>

                                <input type="hidden" name="customer_id" value="{{$customer->id}}}">

                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter email" value="{{$customer->email ? $customer->email : ''}}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter phone number" required value="{{$customer->phone ? $customer->phone : ''}}">
                                </div>

                                <div class="form-group ">
                                    <label></label>
                                    <div class="row">
                                        <label class="col-md-2">Status <span class="text-danger">*</span></label>
                                        <div class="custom-control col-md-3 custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation3" name="status" value="active" <?php echo $customer->status == "active" ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="customControlValidation3">Active</label>
                                        </div>
                                        <div class="custom-control col-md-3 custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation4" name="status" value="inactive" <?php echo $customer->status == "inactive" ? "checked" : ""; ?>>
                                            <label class="custom-control-label" for="customControlValidation4">Inactive</label>
                                        </div>
                                    </div>                                    
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address </label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address" rows="2" style="height: 115px">{{$customer->address ? $customer->address : ''}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="city">City </label>
                                    <input type="text" id="city" class="form-control" name="city" placeholder="Enter city" value="{{$customer->city ? $customer->city : ''}}">
                                </div>

                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" id="zip_code" class="form-control" name="zip_code" placeholder="Enter zip code " value="{{$customer->zip_code ? $customer->zip_code : ''}}">
                                </div>
                                
                            </div>

                        </div>
                      </div>

                      <div class="card-body border-top">
                          <button type="submit" class="btn btn-success">Save</button>
                          <a href="{{URL::to('customers')}}" class="btn btn-danger">Cancel</a>
                      </div>
                        
                  </form>
              </div>

          </div>        
    </div>
  </div>
@endsection