@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">    
@endsection

@section('page')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>    
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ asset('assets/images/faces/2.jpg') }}" alt="User profile picture">
                  </div>
                  <br>
  
                  <h3 class="profile-username text-center admin_name" style="margin: 0">{{ Auth::guard('web')->user()->name }}</h3>
                  <p class="text-muted text-center">Operator Cabdin {{ Auth::guard('web')->user()->cabdin }}</p>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      @if ($key = Session::get('tab'))  
                      <li class="nav-item" role="presentation">
                        <button class="nav-link {{ ($key == 'Personal Information') ? 'active' : '' }}" id="pills-pi-tab" data-bs-toggle="pill" data-bs-target="#pills-pi" type="button" role="tab" aria-controls="pills-pi" aria-selected="true">Personal Information</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link {{ ($key == 'Password') ? 'active' : '' }}" id="pills-pass-tab" data-bs-toggle="pill" data-bs-target="#pills-pass" type="button" role="tab" aria-controls="pills-pass" aria-selected="false">Change Password</button>
                      </li>
                      @else
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pi-tab" data-bs-toggle="pill" data-bs-target="#pills-pi" type="button" role="tab" aria-controls="pills-pi" aria-selected="true">Personal Information</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link " id="pills-pass-tab" data-bs-toggle="pill" data-bs-target="#pills-pass" type="button" role="tab" aria-controls="pills-pass" aria-selected="false">Change Password</button>
                      </li>
                      @endif
                    </ul>
                  @if ($message = Session::get('error'))
                      <div class="alert alert-danger">
                          <strong>{{ $message }}</strong>
                      </div>
                  @endif
                </div><!-- /.card-header -->
                <div class="card-body">
                  @if ($key = Session::get('tab'))
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade {{ ($key == 'Personal Information') ? 'show active' : '' }}" id="pills-pi" role="tabpanel" aria-labelledby="pills-pi-tab">
                          <form class="form-horizontal" method="POST" action="{{ route('user.changeProfile', Auth::guard('web')->user()->id) }}" id="UserInfoForm">
                              @csrf
                              @method('PATCH')
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::guard('web')->user()->name }}" name="name" minlength="5" maxlength="255">
                                    @error('name')
                                      <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::guard('web')->user()->email }}" name="email">
                                    @error('email')
                                      <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone" value="{{ Auth::guard('web')->user()->phone }}" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @error('phone')
                                      <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCabdin" class="col-sm-3 col-form-label">Cabang Dinas</label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="cabdin" name="cabdin" required>
                                      @foreach($cabdin as $cd)
                                          <option value="{{ $cd->id }}" {{ ( $cd->id == Auth::guard('web')->user()->cabdin ) ? 'selected' : '' }}>{{ $cd->nama}}</option>
                                      @endforeach
                                    </select>
                                    @error('cabdin')
                                      <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputKota" class="col-sm-3 col-form-label">Kota/Kab</label>
                              <div class="col-sm-9">
                                  <select class="form-control choices" id="kota" name="kota" >
                                      <option value="">--pilih wilayah kabupaten/kota--</option>
                                      @foreach($kota as $k)
                                          <option value="{{ $k->nama_kota }}" {{ Auth::guard('web')->user()->kota == $k->nama_kota ? 'selected' : ''}}>{{ $k->nama_kota}}</option>
                                      @endforeach
                                  </select>
                                  @error('kota')
                                      <div class="text-danger">*{{ $message }}</div>
                                  @enderror
                              </div>
                            </div>
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-save">Save Changes</button>
                                </div>
                              </div>
                          </form>
                      </div><!-- /.tab-pane -->
                      <div class="tab-pane fade {{ ($key == 'Password') ? 'show active' : '' }}" id="pills-pass" role="tabpanel" aria-labelledby="pills-pass-tab">
                          <form class="form-horizontal" action="{{ route('user.changePassword', Auth::guard('web')->user()->id) }}" method="POST" id="changePasswordUserForm">
                            @csrf
                            @method('PATCH')
                              <div class="form-group row">
                              <label for="inputOldPass" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputOldPass" placeholder="Enter current password" name="oldpassword">
                                <span class="text-danger">@error('oldpassword'){{$message}} @enderror</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                                <span class="text-danger">@error('newpassword'){{$message}} @enderror</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                                <span class="text-danger">@error('cnewpassword'){{$message}} @enderror</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-save btn-danger">Update Password</button>
                              </div>
                            </div>
                          </form>
                      </div> 
                    </div><!-- /.tab-content -->
                  @else
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-pi" role="tabpanel" aria-labelledby="pills-pi-tab">
                          <form class="form-horizontal" method="POST" action="{{ route('user.changeProfile', Auth::guard('web')->user()->id) }}" id="UserInfoForm">
                              @csrf
                              @method('PATCH')
                              <div class="form-group row">
                                  <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::guard('web')->user()->name }}" name="name" minlength="5" maxlength="255">
                                      @error('name')
                                        <div class="text-danger">*{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                  <div class="col-sm-9">
                                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::guard('web')->user()->email }}" name="email">
                                      @error('email')
                                        <div class="text-danger">*{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputPhone" class="col-sm-3 col-form-label">Phone</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="inputPhone" placeholder="Phone" value="{{ Auth::guard('web')->user()->phone }}" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                      @error('phone')
                                        <div class="text-danger">*{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="inputCabdin" class="col-sm-3 col-form-label">Cabang Dinas</label>
                                  <div class="col-sm-9">
                                      <select class="form-control choices" id="cabdin" name="cabdin" required>
                                        @foreach($cabdin as $cd)
                                            <option value="{{ $cd->id }}" {{ ( $cd->id == Auth::guard('web')->user()->cabdin ) ? 'selected' : '' }}>{{ $cd->nama}}</option>
                                        @endforeach
                                      </select>
                                      @error('cabdin')
                                        <div class="text-danger">*{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputKota" class="col-sm-3 col-form-label">Kota/Kab</label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="kota" name="kota" >
                                        <option value="">--pilih wilayah kabupaten/kota--</option>
                                        @foreach($kota as $k)
                                            <option value="{{ $k->nama_kota }}" {{ Auth::guard('web')->user()->kota == $k->nama_kota ? 'selected' : ''}}>{{ $k->nama_kota}}</option>
                                        @endforeach
                                    </select>
                                    @error('kota')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-save">Save Changes</button>
                                </div>
                              </div>
                          </form>
                      </div><!-- /.tab-pane -->
                      <div class="tab-pane fade" id="pills-pass" role="tabpanel" aria-labelledby="pills-pass-tab">
                          <form class="form-horizontal" action="{{ route('user.changePassword', Auth::guard('web')->user()->id) }}" method="POST" id="changePasswordUserForm">
                            @csrf
                            @method('PATCH')
                              <div class="form-group row">
                              <label for="inputOldPass" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputOldPass" placeholder="Enter current password" name="oldpassword">
                                <span class="text-danger">@error('oldpassword'){{$message}} @enderror</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                                <span class="text-danger">@error('newpassword'){{$message}} @enderror</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                                <span class="text-danger">@error('cnewpassword'){{$message}} @enderror</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-save btn-danger">Update Password</button>
                              </div>
                            </div>
                          </form>
                      </div> 
                    </div><!-- /.tab-content -->
                  @endif
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection