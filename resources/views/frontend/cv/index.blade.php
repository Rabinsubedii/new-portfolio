@extends('layouts.app1', ['activePage' => 'frontend.cv.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <a href="{{ url('add-cv') }}" class="btn btn-success float-right">Add CV</a>
            <table class="table table-hover css-serial">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Title</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cv as $item)
                        <tr>
                            <td>&nbsp;</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ url('edit-cv/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-cv/' . $item->id) }}" class="btn btn-info btn-sm"
                                    onclick="confirm('Are you sure ,You want to delete this item ?') || event.stopImmediatePropagation()"
                                    wire:click.prevent="deleteCategory({{ $item->id }})">Delete</i></a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
