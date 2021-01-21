@extends('template')
@section('main_content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-5" >

              <div class="card">
            
                <?php if(empty( $time_slot )){ ?>
                  <form class="form-horizontal" method="post" action="{{url('/doctors/save-time-slot/'.$doctor->id)}}">
                    @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Create</h5>
                      </div>
                      <div class="card-body border-top">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                      {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                            
                            @if(Session::has('error_msg'))
                              <div class="alert alert-danger">{{Session::get('error_msg')}}</div>
                            @endif
                          <div class="form-group">
                              <label for="slot_day">Day <span class="text-danger">*</span></label>
                              <input type="text" id="slot_day" class="form-control" name="slot_day" placeholder="Exp: Monday" required>
                          </div>
                          <div class="form-group">
                              <label for="slot_time">Time <span class="text-danger">*</span></label>
                              <input type="text" id="slot_time" class="form-control" name="slot_time" placeholder="Exp: 3:00pm to 7:00pm" required>
                          </div>

                          <div class="form-group">                            
                              <button type="sumbit" class="btn btn-success">Save</button>
                          </div>
                      </div>
                  </form>
                <?php }else{ ?>
                  <form class="form-horizontal" method="post" action="{{url('/doctors/save-time-slot/'.$doctor->id.'/'.$time_slot->id)}}">
                    @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Edit</h5>
                      </div>
                      <div class="card-body border-top">
                          @if ($errors->any())
                              <div class="alert alert-danger" role="alert">
                                  @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                  @endforeach
                              </div>
                          @endif
                          
                          @if(Session::has('error_msg'))
                            <div class="alert alert-danger">{{Session::get('error_msg')}}</div>
                          @endif

                          <div class="form-group">
                              <label for="slot_day">Day <span class="text-danger">*</span></label>
                              <input type="text" id="slot_day" class="form-control" name="slot_day" placeholder="Enter package name" value="{{$time_slot->slot_day}}" required>

                          </div>
                          <div class="form-group">
                              <label for="slot_time">Time <span class="text-danger">*</span></label>
                              <input type="text" id="slot_time" class="form-control" name="slot_time" placeholder="Exp: 3:00pm to 7:00pm" value="{{$time_slot->slot_time}}" required>

                          </div>

                          <div class="form-group col-md-7">
                            <label>Status <span class="text-danger">*</span></label>
                            <div class="row form-input-role">
                              <div class="custom-control col-md-6 custom-radio">
                                  <input type="radio" class="custom-control-input" id="customControlValidation3" name="status" value="active" <?php echo $time_slot->status == "active" ? "checked" : ""; ?>>
                                  <label class="custom-control-label" for="customControlValidation3">Active</label>
                              </div>
                              <div class="custom-control col-md-6 custom-radio">
                                  <input type="radio" class="custom-control-input" id="customControlValidation4" name="status" value="inactive" <?php echo $time_slot->status == "inactive" ? "checked" : ""; ?>>
                                  <label class="custom-control-label" for="customControlValidation4">Inactive</label>
                              </div>
                            </div>
                        </div>


                          <div class="form-group ">
                              <button type="sumbit" class="btn btn-success">Update</button>
                              <a class="btn btn-danger" href="{{URL::to('/doctors/time-slot/'.$doctor->id)}}">Cancel</a>                       
                          </div>
                      </div>
                  </form>
                <?php } ?>
              </div>
          </div>    

          <div class="col-md-7">
              <div class="card dataTables_wrapper dt-bootstrap4">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">{{$title}}</h5>
                    </div>
                    <div class="card-body border-top">
                    @if(Session::has('success_msg'))
                      <div class="alert alert-success">{{Session::get('success_msg')}}</div>
                    @endif
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" width="30%">Day</th>
                          <th scope="col" width="35%">Time</th>
                          <th scope="col" width="20%">Status</th>
                          <th scope="col" width="15%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($time_slots as $row)
                        <tr>
                          <td>{{$row->slot_day}}</td>
                          <td class="text-center">{{$row->slot_time}}</td>
                          <td class="text-center">
                              @if($row->status == 'active')
                                <span class="text-success">Active</span>
                              @elseif($row->status == 'inactive')
                                <span class="text-warning">Inactive</span>
                              @else
                                <span class="text-danger">Deleted</span>
                              @endif
                          </td>
                          <td>
                            <div class="list-action">
                                    <button type="button" class="btn btn-light dropdown-toggle list-action-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>

                                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                      <a class="dropdown-item" href="{{URL::to('doctors/time-slot/'.$doctor->id.'/'.$row->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                      <a class="dropdown-item" href="{{URL::to('doctors/delete-time-slot/'.$doctor->id.'/'.$row->id)}}" onclick="return confirm('Are you sure about deleting ??')"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </div>
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
@endsection