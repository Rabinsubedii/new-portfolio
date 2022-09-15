@extends('layouts.app1', ['activePage' => 'frontend.latestwork.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Add Latest Work</h3>
            <a href="{{ url('latestwork') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('add-work') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label for="name">Project Link</label>
                <input type="text" class="form-control" name="url" required>
            </div>

            <div class="form-group">
                <label for="title">Description</label>
                <textarea name="description" id="body"></textarea>
            </div>


            <label for="status">Status</label>
            <select name="status" class="form-control" id="">
                <option value="0" name="status">Active</option>
                <option value="1" name="status">Deactive</option>
            </select>

            <div class="mt-3">
                <input type="file" name="image" id="image" required>
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
