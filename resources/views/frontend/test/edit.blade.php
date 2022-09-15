@extends('layouts.app1', ['activePage' => 'frontend.setting.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container content">
        <div class="heading">
            <h3>Update Setting</h3>
            <a href="{{ url('test') }}" class="btn btn-success float-right">Back</a>
        </div>
        @if (session('status'))
            <h4 class="alert alert-success">{{ session('status') }}</h4>
        @endif
        <form action="{{ url('updatest/' . $test->id) }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">


                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="title" name="title" class="form-control" value="{{ $test->title }}">
                    </div>


                    <div class="mt-1">
                        <label for="image">Thum</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <img class="mt-3" src="{{ asset($test->image) }}" height="70px" alt="logo">
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control">{{ $test->body }}</textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary"> Save </button>
                    </div>
                </div>
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
