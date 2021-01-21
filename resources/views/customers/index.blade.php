@extends('template')
@section('main_content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card dataTables_wrapper dt-bootstrap4">
                <div class="card-body">
                      <h5 class="card-title">
                        <?php echo $title; ?>
                        <a href="{{URL::to('/customers/create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Create New</a>
                      </h5>
                </div>
                <div class="card-body border-top">

                    @if(Session::has('success_msg'))
                      <div class="alert alert-success">{{Session::get('success_msg')}}</div>
                    @endif
                    @if(Session::has('error_msg'))
                      <div class="alert alert-danger">{{Session::get('error_msg')}}</div>
                    @endif 

                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Created</th>
                          <th scope="col">Cusromer Info</th>
                          <th scope="col" class="text-center">Status</th>
                          <th scope="col">Last Login</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if( !$customers->isEmpty() )
                          @foreach($customers as $row)
                          <tr>
                            <td>
                                <?php echo longDateHuman($row->created_at, 'for_list_datetime'); ?>
                            </td>
                            <td scope="row">
                                <div class="profile-img">
                                  @if( $row->photo != "" )
                                    <img src="{{asset($file_path.$row->photo)}}" alt="user">
                                  @else
                                    <img src="{{asset($file_path.'no_image.jpg')}}" alt="user">
                                  @endif
                                </div>
                                <div class="profile-content mt-1">
                                    <p><strong>{{$row->full_name}}</strong></p>
                                    <p>{{$row->email}}</p>
                                </div>
                            </td>
                            <td class="text-center">

                              @if($row->status == 'active')
                                <a href="{{URL::to('customers/updateStatus/'.$row->id.'/inactive')}}" onclick="return confirm('Are you sure about change status ??')"><span class="text-success">Active</span></a>
                              @elseif($row->status == 'inactive')
                                <a href="{{URL::to('customers/updateStatus/'.$row->id.'/active')}}" onclick="return confirm('Are you sure about change status ??')"><span class="text-warning">Inactive</span></a>
                              @else
                                <span class="text-danger">Deleted</span>
                              @endif

                            </td>
                            <td>
                               @if($row->last_login != "")
                                  <?php echo longDateHuman($row->last_login, 'for_list_datetime'); ?>
                               @else
                                  <span>Not yet</span>
                               @endif
                            </td>
                            <td class="text-center">
                                <div class="list-action">
                                    <button type="button" class="btn btn-light dropdown-toggle list-action-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>

                                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                      <a class="dropdown-item" href="{{URL::to('customers/edit/'.$row->id)}}"><i class="fas fa-edit"></i> Edit User</a>

                                      <a class="dropdown-item" href="{{URL::to('customers/reset-password/'.$row->id)}}" onclick="return confirm('After Reset Password Will Be (123456) !')"><i class="fas fa-key"></i> Reset Password</a>

                                      <a class="dropdown-item" href="{{URL::to('customers/delete/'.$row->id)}}" onclick="return confirm('Are you sure about deleting ??')"><i class="fas fa-trash"></i> Delete User</a>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          @endforeach
                        @endif

                        
                      </tbody>
                    </table>
                </div>
                
            </div>
          </div>        
    </div>
  </div>
@endsection
