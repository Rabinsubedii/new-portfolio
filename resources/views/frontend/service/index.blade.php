@extends('layouts.app1', ['activePage' => 'frontend.service.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <a href="{{ url('add-service') }}" class="btn btn-success float-right">Add</a>
            <table class="table table-hover css-serial">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">icon</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service as $item)
                        <tr>
                            <td>&nbsp;</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('uploads/service/' . $item->icon) }}" height="70" alt="service icon">
                            </td>
                            <td>
                                <a href="{{ url('edit-service/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-service/' . $item->id) }}" class="btn btn-info btn-sm"
                                    onclick="confirm('Are you sure ,You want to delete this category ?') || event.stopImmediatePropagation()"
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
