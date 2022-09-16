@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br/><br/>
                    <center>
                        <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg" src="{{ (!empty($userData->profile_image)?url('upload/profileImage/'.$userData->profile_image):url('upload/no_image.jpg'))}}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $userData->name }}</h4><hr>
                        <h4 class="card-title">UserName: {{ $userData->username }}</h4><hr>
                        <h4 class="card-title">User Email: {{ $userData->email }}</h4><hr>

                        <a href="{{ route('admin.editProfile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

@endsection