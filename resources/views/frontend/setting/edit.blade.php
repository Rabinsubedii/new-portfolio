@extends('layouts.app1', ['activePage' => 'frontend.setting.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Update Setting</h3>
            <a href="{{ url('service') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('updatesetting/' . $setting->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mt-1">
                        <label for="">Logo</label>
                        <input type="file" name="logo" id="image">
                        <img class="mt-3" src="{{ asset('uploads/logo/' . $setting->logo) }}" height="70px"
                            alt="logo">
                    </div>
                    <div class="mt-4">
                        <label for="">Home Image</label>
                        <input type="file" name="homeimg" id="image">
                        <img class="mt-3" src="{{ asset('uploads/homeimg/' . $setting->homeimg) }}" height="70px"
                            alt="homeimg icon">
                    </div>
                    <div class="mt-4">
                        <label for="">Address Icon</label>
                        <input type="file" name="addressicon" id="image">
                        <img class="mt-3" src="{{ asset('uploads/addressicon/' . $setting->addressicon) }}" height="70px"
                            alt="Service icon">
                    </div>
                    <div class="mt-4">
                        <label for="">Phone Icon</label>
                        <input type="file" name="phoneicon" id="image">
                        <img class="mt-3" src="{{ asset('uploads/phoneicon/' . $setting->phoneicon) }}" height="70px"
                            alt="phoneicon icon">
                    </div>
                    <div class="mt-4">
                        <label for="">Email Icon</label>
                        <input type="file" name="emailicon" id="image">
                        <img class="mt-3" src="{{ asset('uploads/emailicon/' . $setting->emailicon) }}" height="70px"
                            alt="emailicon icon">
                    </div>

                    <div class="mt-4">
                        <label for="">Github Icon</label>
                        <input type="file" name="giticon" id="image">
                        <img class="mt-3" src="{{ asset('uploads/giticon/' . $setting->giticon) }}" height="70px"
                            alt="giticon icon">
                    </div>
                    <div class="mt-4">
                        <label for="">Facebook Icon</label>
                        <input type="file" name="fbicon" id="image">
                        <img src="{{ asset('uploads/fbicon/' . $setting->fbicon) }}" class="mt-3" height="70px"
                            alt="fbicon icon">
                    </div>
                    <div class="mt-4">
                        <label for="">Insta Icon</label>
                        <input type="file" name="instaicon" id="image">
                        <img src="{{ asset('uploads/instaicon/' . $setting->instaicon) }}" height="70px"
                            alt="instaicon icon" class="mt-3">
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="copyright">CopyRight Info</label>
                        <input type="text" class="form-control" value="{{ $setting->copyrightinfo }}"
                            name="copyrightinfo" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" value="{{ $setting->emailaddress }}" name="emailaddress"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" value="{{ $setting->phonenumber }}" name="phonenumber"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="post">Post</label>
                        <input type="text" class="form-control" value="{{ $setting->post }}" name="post"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="post">Address</label>
                        <input type="text" class="form-control" value="{{ $setting->address }}" name="address"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="post">GitHub Link</label>
                        <input type="text" class="form-control" value="{{ $setting->gitlink }}" name="gitlink"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="post">Instagram Link</label>
                        <input type="text" class="form-control" value="{{ $setting->instalink }}" name="instalink"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="post">Facebook Link</label>
                        <input type="text" class="form-control" value="{{ $setting->fblink }}" name="fblink"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="post">Map Link</label>
                        <input type="text" class="form-control" value="{{ $setting->map }}" name="map" required>
                    </div>


                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="0" name="status">Active</option>
                        <option value="1" name="status">Deactive</option>
                    </select>

                    <div class="form-group">
                        <button class="btn btn-primary"> Save </button>
                    </div>
                </div>
            </div>






        </form>
    </div>
@endsection
