@extends('template')
@section('main_content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card dataTables_wrapper dt-bootstrap4">
                <div class="card-body">
                      <h5 class="card-title">
                        <?php echo $title; ?>
                        <a href="{{URL::to('/banners/create')}}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Create New</a>
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
                          <th scope="col" width="20%">Created</th>
                          <th scope="col" width="40%">Title</th>
                          <th scope="col" width="15%" class="text-center">Photo</th>
                          <th scope="col" width="15%" class="text-center">Status</th>
                          <th scope="col" width="10%" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if( !$banners->isEmpty() )
                          @foreach($banners as $row)
                            <?php $banner = $row; ?>
                          <tr>
                            <td scope="row">
                               <?php echo longDateHuman($row->created_at, 'for_list_datetime'); ?>
                            </td>
                            <td>
                              <?php
                                 echo $banner->title_1;
                                 echo $banner->title_2 ? "</br>".$banner->title_2: "";
                              ?>
                            </td>
                            <td class="text-center">
                              <?php if( !empty( $banner->link ) ){ ?>
                                <a href="{{$banner->link}}" target="_blank"><img style="width:100%" src="{{asset($file_path.$row->photo)}}" alt="Banner"></a>
                              <?php }else{ ?>
                                <img style="width:100%" src="{{asset($file_path.$row->photo)}}" alt="Banner">
                              <?php } ?>
                              
                            </td>
                            <td class="text-center">
                              @if($row->status == 'active')
                                <a href="{{URL::to('banners/updateStatus/'.$row->id.'/inactive')}}" onclick="return confirm('Are you sure about change status ??')"><span class="text-success">Active</span></a>
                              @else
                                <a href="{{URL::to('banners/updateStatus/'.$row->id.'/active')}}" onclick="return confirm('Are you sure about change status ??')"><span class="text-warning">Inactive</span></a>
                              @endif
                            </td>
                            <td class="text-center">
                                <div class="list-action">
                                    <button type="button" class="btn btn-light dropdown-toggle list-action-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>

                                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                      <a class="dropdown-item" href="{{URL::to('banners/edit/'.$row->id)}}"><i class="fas fa-edit"></i> Edit Banner</a>
                                      <a class="dropdown-item" href="{{URL::to('banners/delete/'.$row->id)}}" onclick="return confirm('Are you sure about deleting ??')"><i class="fas fa-trash"></i> Delete Banner</a>
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