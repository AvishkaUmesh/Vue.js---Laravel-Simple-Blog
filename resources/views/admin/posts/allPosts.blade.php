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
                    <h3>All Posts</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">


                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <!-- <div class="card-header">
                                                                                            Simple Datatable
                                                                                        </div> -->
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Post Image</th>
                                <th>Post Title</th>
                                <th>Post Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/posts/' . $post->image) }}" width="150"
                                            height="100" />
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/post/edit/' . $post->id) }}"
                                            style="padding-right:30px;"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ URL::to('admin/post/delete/' . $post->id) }}" id="delete"
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
            var element = document.getElementById("posts");
            element.classList.add("active");
            var element = document.getElementById("postExpand");
            element.classList.add("active");
            var element = document.getElementById("allPosts");
            element.classList.add("active");
        </script>
    @endpush
@endsection
