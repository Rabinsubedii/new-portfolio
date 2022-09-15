@extends('layouts.app1', ['activePage' => 'frontend.test.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Add Setting</h3>
            <a href="{{ url('test') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('add-test') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label for="title">Body</label>
                <textarea name="body" id="body"></textarea>
            </div>

            <div class="mt-3">
                <label for="image">Thum Image</label>
                <input type="file" name="image" required>
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
