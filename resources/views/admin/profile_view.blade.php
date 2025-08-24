@extends('admin.dashboard')
@section('adminContent') 

    <div class="page-content">

        <div class="row profile-body">
          <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div>
                                <img class="wd-80 ht-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                                <span class="h4 ms-3 ">{{ $profileData->name }}</span>
                            </div>

                        </div>
                        <p>Hi! I'm {{ $profileData->name }} the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                            <p class="text-muted">{{ $profileData->created_at }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Admin Profile</h6>

                            <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->username }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $profileData->email }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->phone }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->address }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Photo</label>
                                    <input class="form-control" name="photo" type="file" id="image">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label"> </label>
                                    <img id="showImage" class="wd-70 ht-70 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>

                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload =function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>

@endsection