@extends('template')
@section('main_content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-5" >

              <div class="card">
            
                <?php if(empty( $category )){ ?>
                  <form class="form-horizontal" method="post" action="{{url('/category/store')}}">
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
                              <label for="name">Category Name <span class="text-danger">*</span></label>
                              <input type="text" id="name" class="form-control" name="name" placeholder="Enter category name" required>
                          </div>

                          <div class="form-group">                            
                              <button type="sumbit" class="btn btn-success">Save</button>
                          </div>
                      </div>
                  </form>
                <?php }else{ ?>
                  <form class="form-horizontal" method="post" action="{{url('/category/update')}}" enctype="">
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

                          <input type="hidden" name="id" value="{{$category->id}}">
                          <div class="form-group">
                              <label for="name">Category Name <span class="text-danger">*</span></label>
                              <input type="text" id="name" class="form-control" name="name" placeholder="Enter category name" value="{{$category->name}}" required>

                          </div>

                          <div class="form-group col-md-7">
                            <label>Status <span class="text-danger">*</span></label>
                            <div class="row form-input-role">
                              <div class="custom-control col-md-6 custom-radio">
                                  <input type="radio" class="custom-control-input" id="customControlValidation3" name="status" value="active" <?php echo $category->status == "active" ? "checked" : ""; ?>>
                                  <label class="custom-control-label" for="customControlValidation3">Active</label>
                              </div>
                              <div class="custom-control col-md-6 custom-radio">
                                  <input type="radio" class="custom-control-input" id="customControlValidation4" name="status" value="inactive" <?php echo $category->status == "inactive" ? "checked" : ""; ?>>
                                  <label class="custom-control-label" for="customControlValidation4">Inactive</label>
                              </div>
                            </div>
                        </div>


                          <div class="form-group ">
                              <button type="sumbit" class="btn btn-success">Update</button>
                              <a class="btn btn-danger" href="{{URL::to('/category')}}">Cancel</a>                       
                          </div>
                      </div>
                  </form>
                <?php } ?>
              </div>
          </div>    

          <div class="col-md-7">
              <div class="card dataTables_wrapper dt-bootstrap4">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Categories</h5>
                    </div>
                    <div class="card-body border-top">
                    @if(Session::has('success_msg'))
                      <div class="alert alert-success">{{Session::get('success_msg')}}</div>
                    @endif
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col" width="25%">Created</th>
                          <th scope="col" width="50%">Name</th>
                          <th scope="col" class="text-center">Status</th>
                          <th scope="col" class="text-center" width="10%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $sl = 1; ?>
                        @foreach($categories as $row)
                        <tr>
                          <th scope="row">{{$row->created_at}}</th>
                          <td>{{$row->name}}</td>
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
                                      <a class="dropdown-item" href="{{URL::to('category/'.$row->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                      <a class="dropdown-item" href="{{URL::to('category/delete/'.$row->id)}}" onclick="return confirm('Are you sure about deleting ??')"><i class="fas fa-trash"></i> Delete</a>
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