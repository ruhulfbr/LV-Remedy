@extends('template')
@section('main_content')

  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                
                <form class="form-horizontal" method="post" action="{{url('/users/store')}}" enctype="multipart/form-data">
                  @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Create User</h5>
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

                            <div class="form-group col-md-6">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Email <span class="text-danger">*</span></label>
                                <input type="email" id="name" class="form-control" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirm_passqord">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" id="confirm_passqord" class="form-control" name="confirm_password" placeholder="Re-enter password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Usre Role <span class="text-danger">*</span></label>
                                <div class="row form-input-role">
                                  <div class="custom-control col-md-3 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation1" name="user_type" value="admin" checked required>
                                      <label class="custom-control-label" for="customControlValidation1">Admin</label>
                                  </div>
                                  <div class="custom-control col-md-3 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation2" name="user_type" value="support" required>
                                      <label class="custom-control-label" for="customControlValidation2">Support</label>
                                  </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="confirm_passqord">User Photo</label>
                                <div class="custom-file">
                                    <input type="file" name="user_image" class="custom-file-input" id="validatedCustomFile">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose
                                        file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                            
                        </div>
                      </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <a class="btn btn-danger" href="{{URL::to('users')}}">Cancel</a>
                            </div>
                        </div>
                  </form>
              </div>

          </div>        
    </div>
  </div>
@endsection