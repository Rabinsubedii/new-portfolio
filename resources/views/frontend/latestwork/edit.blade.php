@extends('layouts.app1', ['activePage' => 'frontend.latestwork.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Update Latest Work</h3>
            <a href="{{ url('latestwork') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('updatework/' . $latestwork->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" value="{{ $latestwork->title }}" name="title" required>
            </div>
            <div class="form-group">
                <label for="name">Project Link</label>
                <input type="text" class="form-control" value="{{ $latestwork->url }}" name="url" required>
            </div>

            <label for="status">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" name="status">Active</option>
                <option value="1" name="status">Deactive</option>
            </select>

            <div class="mt-3">
                <input type="file" name="image" id="image">
                <img src="{{ asset($latestwork->image) }}" height="70px" alt="Service icon">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea id="body" name="description">{!! $latestwork->description !!}</textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary"> Save </button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            }, {
                alignment: {
                    options: ['right', 'right']
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            })
    </script>
@endpush
