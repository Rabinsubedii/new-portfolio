@extends('layouts.app1', ['activePage' => 'frontend.contact.index', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <a href="{{ url('add-work') }}" class="btn btn-success float-right">Add</a>
            <table class="table table-hover css-serial">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contact as $item)
                        <tr>
                            <td>&nbsp;</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>
                            <td>
                                <a href="{{ url('delete-contact/' . $item->id) }}" class="btn btn-info btn-sm"
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
