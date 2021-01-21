@extends('template')
@section('main_content')

  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                
                <form class="form-horizontal" method="post" action="{{url('/doctors/store')}}" enctype="multipart/form-data">
                  @csrf
                      <div class="card-body">
                        <h5 class="card-title">
                          <?php echo $title; ?>
                          <a href="{{URL::to('/doctors')}}" class="btn btn-info float-right"><i class="fas fa-users"></i> Manage Doctors</a>
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
                                    <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Enter full name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter phone number" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_passqord">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" id="confirm_passqord" class="form-control" name="confirm_password" placeholder="Re-enter password" required>
                                </div>

                                <div class="form-group">
                                    <label for="confirm_passqord"> Photo <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="doctor_image" class="custom-file-input" id="validatedCustomFile" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                            file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="category_list">Category <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" id="category_list" style="width: 100%; height:36px;" name="category[]" multiple="multiple" placeholder="Choose Categories">                                          
                                          <?php if( !empty($categories) ){ ?>
                                            @foreach($categories as $item)
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                          <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="qualification">Qualification <span class="text-danger">*</span></label>
                                    <input type="text" id="qualification" class="form-control" name="qualification" placeholder="Enter qualification" required>
                                </div>

                                <div class="form-group">
                                    <label for="current_workplace">Current workplace <span class="text-danger">*</span></label>
                                    <input type="text" id="current_workplace" class="form-control" name="current_workplace" placeholder="Enter current workplace" required>
                                </div>

                                <div class="form-group">
                                    <label for="current_workplace_designation">Current workplace designation <span class="text-danger">*</span></label>
                                    <input type="text" id="current_workplace_designation" class="form-control" name="current_workplace_designation" placeholder="Enter current_workplace_designation" required>
                                </div>

                                <div class="form-group">
                                    <label for="specialized">Specialized <span class="text-danger">*</span></label>
                                    <input type="text" id="specialized" class="form-control" name="specialized" placeholder="Enter specialized" required>
                                </div>

                            </div>


                        </div>
                      </div>

                      <div class="card-body border-top">
                          <button type="submit" class="btn btn-success">Save</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                      </div>
                        
                  </form>
              </div>

          </div>        
    </div>
  </div>
@endsection


