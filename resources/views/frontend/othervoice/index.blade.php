@extends('layouts.app1', ['activePage' => 'frontend.othervoice.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <a href="{{ url('add') }}" class="btn btn-success float-right">Add other voice</a>
            <table class="table table-hover css-serial">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($othervoice as $item)
                        <tr>
                            <td>&nbsp;</td>
                            <td>{{ $item->customername }}</td>

                            <td><img src="{{ asset('uploads/client/' . $item->icon) }}" height="70" alt="service icon">
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ url('edit-othersvoice/' . $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-othersvoice/' . $item->id) }}" class="btn btn-info btn-sm"
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
