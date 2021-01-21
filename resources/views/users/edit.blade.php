@extends('template')
@section('main_content')

  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                
                <form class="form-horizontal" method="post" action="{{url('/users/update')}}" enctype="multipart/form-data">
                  @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Edit User</h5>
                      </div>
                      <div class="card-body border-top">
                        <div class="row">

                            <div class="col-md-12">
                                @if ($errors->any())
                                      <div class="alert alert-danger" role="alert">
                                          @foreach ($errors->all() as $error)
                                            {{ $error }}<br>
                                          @endforeach
                                      </div>
                                  @endif
                                  @if(Session::has('success_msg'))
                                    <div class="alert alert-success">{{Session::get('success_msg')}}</div>
                                  @endif
                                  @if(Session::has('error_msg'))
                                    <div class="alert alert-danger">{{Session::get('error_msg')}}</div>
                                  @endif
                            </div>

                            <input type="hidden" name="user_id" value="{{$user->id}}}">

                            <div class="form-group col-md-6">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Enter full name" required value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Email <span class="text-danger">*</span></label>
                                <input type="email" id="name" class="form-control" name="email" placeholder="Enter email" required value="{{ $user->email }}">
                            </div>

                            @if($user->status != 'delete')
                              <div class="form-group col-md-3">
                                  <label>User Role <span class="text-danger">*</span></label>
                                <div class="row form-input-role">
                                  <div class="custom-control col-md-6 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation1" name="user_type" value="admin" <?php echo $user->type == "admin" ? "checked" : ""; ?> required>
                                      <label class="custom-control-label" for="customControlValidation1">Admin</label>
                                  </div>
                                  <div class="custom-control col-md-6 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation2" name="user_type" value="support" <?php echo $user->type == "support" ? "checked" : ""; ?> required>
                                      <label class="custom-control-label" for="customControlValidation2">Support</label>
                                  </div>
                                </div>
                            </div>
                            @else
                              <div class="form-group col-md-6">
                                  <label>User Role <span class="text-danger">*</span></label>
                                <div class="row form-input-role">
                                  <div class="custom-control col-md-3 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation1" name="user_type" value="admin" <?php echo $user->type == "admin" ? "checked" : ""; ?> required>
                                      <label class="custom-control-label" for="customControlValidation1">Admin</label>
                                  </div>
                                  <div class="custom-control col-md-3 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation2" name="user_type" value="support" <?php echo $user->type == "support" ? "checked" : ""; ?> required>
                                      <label class="custom-control-label" for="customControlValidation2">Support</label>
                                  </div>
                                </div>
                            </div>
                            @endif
                              

                            @if($user->status != 'delete')

                            <div class="form-group col-md-3">
                                <label>Status <span class="text-danger">*</span></label>
                                <div class="row form-input-role">
                                  <div class="custom-control col-md-6 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation3" name="status" value="active" <?php echo $user->status == "active" ? "checked" : ""; ?>>
                                      <label class="custom-control-label" for="customControlValidation3">Active</label>
                                  </div>
                                  <div class="custom-control col-md-6 custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation4" name="status" value="inactive" <?php echo $user->status == "inactive" ? "checked" : ""; ?>>
                                      <label class="custom-control-label" for="customControlValidation4">Inactive</label>
                                  </div>
                                </div>
                            </div>

                            @endif

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
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{URL::to('users')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                  </form>
              </div>

          </div>   

          <div class="col-md-6">
              <div class="card">
                
                <form class="form-horizontal" method="post" action="{{url('/users/updatePassword')}}" enctype="multipart/form-data">
                  @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Change Password</h5>
                      </div>
                      <div class="card-body border-top">
                        <div class="row">
                            <div class="col-md-12">
                                  @if(Session::has('pass_success_msg'))
                                    <div class="alert alert-success">{{Session::get('pass_success_msg')}}</div>
                                  @endif
                                  @if(Session::has('pass_error_msg'))
                                    <div class="alert alert-danger">{{Session::get('pass_error_msg')}}</div>
                                  @endif
                            </div>

                            <input type="hidden" name="user_id" value="{{$user->id}}}">

                            <div class="form-group col-md-12">
                                <label for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="confirm_passqord">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" id="confirm_passqord" class="form-control" name="confirm_password" placeholder="Re-enter password" required>
                            </div>
                            
                        </div>
                      </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-info">Update Password</button>
                                <a href="{{URL::to('users')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                  </form>
              </div>

          </div>      
    </div>
  </div>
@endsection