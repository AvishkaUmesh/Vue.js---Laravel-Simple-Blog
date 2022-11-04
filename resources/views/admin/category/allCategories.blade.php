@extends('layouts.app')
@section('content')
    @push('css')
        <style>
            .dataTable-info {
                display: none;
            }
        </style>
    @endpush

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>All Categories</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">

                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <!-- <div class="card-header">Simple Datatable </div> -->
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $cat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/category/edit/' . $cat->id) }}"
                                            style="padding-right:30px;"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ URL::to('admin/category/delete/' . $cat->id) }}" id="delete"
                                            class="delete"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    @push('js')
        <script type="text/javascript">
            var element = document.getElementById("category");
            element.classList.add("active");
            var element = document.getElementById("categoryExpand");
            element.classList.add("active");
            var element = document.getElementById("allCategories");
            element.classList.add("active");
        </script>
    @endpush
@endsection
