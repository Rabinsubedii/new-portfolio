@extends('layouts.app1', ['activePage' => 'frontend.setting.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Update Service</h3>
            <a href="{{ url('service') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('updateservice/' . $service->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ $service->name }}" name="name" required>
            </div>

            <label for="status">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" name="status">Active</option>
                <option value="1" name="status">Deactive</option>
            </select>

            <div class="mt-3">
                <input type="file" name="icon" id="image">
                <img src="{{ asset('uploads/service/' . $service->icon) }}" height="70px" alt="Service icon">
            </div>

            <div class="form-group">
                <button class="btn btn-primary"> Save </button>
            </div>
        </form>
    </div>
@endsection
