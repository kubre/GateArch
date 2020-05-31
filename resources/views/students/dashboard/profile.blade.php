@extends('students.dashboard.master')

@section('page-title')
    Student Profile
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" id='name' class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">mobile</label>
                                        <input type="text" name='mobile' class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar bg-white p-3">
                        <a href="javascript:;">
                            <img class="img" src="/images/student.png" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">(Engineering Student)</h6>
                        <h4 class="card-title">ABCD Name</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection