@extends('layouts.app1', ['activePage' => 'frontend.othervoice.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Customer Voice</h3>
            <a href="{{ url('latestwork') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('add') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="customername" required>
            </div>

            <div class="form-group">
                <label for="name">description</label>
                <textarea type="text" class="form-control" name="description" required></textarea>
            </div>

            <label for="status">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" name="status">Active</option>
                <option value="1" name="status">Deactive</option>
            </select>

            <div class="mt-3">
                <input type="file" name="icon" id="image" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary"> Save </button>
            </div>
        </form>
    </div>
@endsection
