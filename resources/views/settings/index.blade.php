@extends('template')
@section('main_content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                    <h5 class="card-title m-b-0"><?php echo $title; ?></h5>
                        @if ($errors->any())
                            <div class="alert alert-danger m-t-10" role="alert">
                                @foreach ($errors->all() as $error)
                                  {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                        
                        @if(Session::has('error_msg'))
                          <div class="alert alert-danger m-t-10">{{Session::get('error_msg')}}</div>
                        @endif

                        @if(Session::has('success_msg'))
                          <div class="alert alert-success m-t-10">{{Session::get('success_msg')}}</div>
                        @endif   
                  </div>
              </div>
          </div>
          <div class="col-md-6" >              
              <div class="card">
                  <form class="form-horizontal" method="post" action="{{url('/settings/update')}}">
                    @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Site Info</h5>
                      </div>
                      <div class="card-body border-top">
                          <div class="form-group">
                              <label for="site_title">Title</label>
                              <input type="text" id="site_title" class="form-control" name="site_title" placeholder="Enter title" value="{{ getSettingsValue('site_title') }}">
                          </div>

                          <div class="form-group">
                              <label for="site_slogan">Slogan</label>
                              <input type="text" id="site_slogan" class="form-control" name="site_slogan" placeholder="Enter slogan" value="{{ getSettingsValue('site_slogan') }}" >
                          </div>

                          <div class="form-group">
                              <label for="active_hours">Active Hours</label>
                              <input type="text" id="active_hours" class="form-control" name="active_hours" placeholder="Enter active hours" value="{{ getSettingsValue('active_hours') }}" >
                          </div>

                          <div class="form-group">
                              <label for="site_address">Address</label>
                              <input type="text" id="site_address" class="form-control" name="site_address" placeholder="Enter address" value="{{ getSettingsValue('site_address') }}" >
                          </div>
                          <div class="form-group">
                              <label for="site_email">Contact Email</label>
                              <input type="text" id="site_email" class="form-control" name="site_email" placeholder="Enter contact" value="{{ getSettingsValue('site_email') }}" >
                          </div>

                          <div class="form-group">
                              <label for="site_contact">Contact Numbers</label>
                              <input type="text" id="site_contact" class="form-control" name="site_contact" placeholder="Enter contact" value="{{ getSettingsValue('site_contact') }}" >
                          </div>

                          <div class="form-group">                            
                              <button type="sumbit" class="btn btn-success">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>  

          <div class="col-md-6" >              
              <div class="card">
                  <form class="form-horizontal" method="post" action="{{url('/settings/update')}}">
                    @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Social Info</h5>
                      </div>
                      <div class="card-body border-top">
                          <div class="form-group">
                              <label for="social_facebook">Facebook</label>
                              <input type="text" id="social_facebook" class="form-control" name="social_facebook" value="{{ getSettingsValue('social_facebook') }}">
                          </div>                          

                          <div class="form-group">
                              <label for="social_linkdin">Linkdin</label>
                              <input type="text" id="social_linkdin" class="form-control" name="social_linkdin" value="{{ getSettingsValue('social_linkdin') }}" >
                          </div>
                          <div class="form-group">
                              <label for="social_twitter">Twitter</label>
                              <input type="text" id="social_twitter" class="form-control" name="social_twitter" value="{{ getSettingsValue('social_twitter') }}" >
                          </div>

                          <div class="form-group">
                              <label for="social_youtube">Youtube</label>
                              <input type="text" id="social_youtube" class="form-control" name="social_youtube" value="{{ getSettingsValue('social_youtube') }}" >
                          </div>

                          <div class="form-group">
                              <label for="social_skype">Skype</label>
                              <input type="text" id="social_skype" class="form-control" name="social_skype" value="{{ getSettingsValue('social_skype') }}" >
                          </div>

                          <div class="form-group">
                              <label for="social_pinterest">Pinterest</label>
                              <input type="text" id="social_pinterest" class="form-control" name="social_pinterest" value="{{ getSettingsValue('social_pinterest') }}" >
                          </div>

                          
                          <div class="form-group">                            
                              <button type="sumbit" class="btn btn-success">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>  

          <div class="col-md-6" >              
              <div class="card">
                  <form class="form-horizontal" method="post" action="{{url('/settings/update')}}">
                    @csrf
                      <div class="card-body">
                        <h5 class="card-title m-b-0">Email SMTP</h5>
                      </div>
                      <div class="card-body border-top">
                          <div class="form-group">
                              <label for="smtp_host">Host</label>
                              <input type="text" id="smtp_host" class="form-control" name="smtp_host" value="{{ getSettingsValue('smtp_host') }}">
                          </div>

                          <div class="form-group">
                              <label for="smtp_post">Post</label>
                              <input type="text" id="smtp_post" class="form-control" name="smtp_post" value="{{ getSettingsValue('smtp_post') }}" >
                          </div>

                          <div class="form-group">
                              <label for="smtp_user">User</label>
                              <input type="text" id="smtp_user" class="form-control" name="smtp_user" value="{{ getSettingsValue('smtp_user') }}" >
                          </div>
                          <div class="form-group">
                              <label for="smtp_password">Password</label>
                              <input type="text" id="smtp_password" class="form-control" name="smtp_password" value="{{ getSettingsValue('smtp_password') }}" >
                          </div>
                          

                          <div class="form-group">                            
                              <button type="sumbit" class="btn btn-success">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>  



    </div>
  </div>
@endsection