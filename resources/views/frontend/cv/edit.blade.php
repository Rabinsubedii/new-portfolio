@extends('layouts.app1', ['activePage' => 'frontend.cv.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Update CV</h3>
            <a href="{{ url('cv') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('updatecv/' . $cv->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ $cv->title }}" name="title" required>
            </div>


            <label for="status">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" name="status">Active</option>
                <option value="1" name="status">Deactive</option>
            </select>

            <div class="mt-3">
                <input type="file" name="cv" id="cv">

            </div>

            <div class="form-group">
                <button class="btn btn-primary"> Update </button>
            </div>
        </form>
    </div>
@endsection
