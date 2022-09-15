@extends('layouts.app1', ['activePage' => 'frontend.setting.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Add Setting</h3>
            <a href="{{ url('setting') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('add-setting') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf

            <div class="mt-1">
                <label for="logg">Logo</label>
                <input type="file" name="logo" id="image" required>
            </div>

            <div class="mt-3">
                <label for="logg">Home Image</label>
                <input type="file" name="homeimg" id="homeimg" required>
            </div>

            <div class="mt-3">
                <label for="logg">Address Icon</label>
                <input type="file" name="addressicon" id="addressicon" required>
            </div>

            <div class="mt-3">
                <label for="logg">Phone Icon</label>
                <input type="file" name="phoneicon" id="phoneicon" required>
            </div>
            <div class="mt-3">
                <label for="logg">Email Icon</label>
                <input type="file" name="emailicon" id="emailicon" required>
            </div>
            <div class="mt-3">
                <label for="logg">GitHub Icon</label>
                <input type="file" name="giticon" id="giticon" required>
            </div>
            <div class="mt-3">
                <label for="logg">Facebook Icon</label>
                <input type="file" name="fbicon" id="fbicon" required>
            </div>
            <div class="mt-3">
                <label for="logg">Instagram Icon</label>
                <input type="file" name="instaicon" id="instaicon" required>
            </div>

            <div class="form-group">
                <label for="copyright">Footer Copyright</label>
                <input type="text" name="copyrightinfo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="emailaddress">Email</label>
                <input type="text" name="emailaddress" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input type="number" minlength="1" name="phonenumber" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phonenumber">post</label>
                <input type="text" name="post" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gitlink">Github Link</label>
                <input type="text" name="gitlink" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gitlink">Instagram Link</label>
                <input type="text" name="instalink" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gitlink">Facebook Link</label>
                <input type="text" name="fblink" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gitlink">Map</label>
                <input type="text" name="map" class="form-control" required>
            </div>


            <label for="status">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" name="status">Active</option>
                <option value="1" name="status">Deactive</option>
            </select>


            <div class="form-group">
                <button class="btn btn-primary"> Save </button>
            </div>
        </form>
    </div>
@endsection
