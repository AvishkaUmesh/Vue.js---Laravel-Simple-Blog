@extends('layouts.app')

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-612col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Post</h4>

                    </div>
                    <div class="card-content">


                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form form-horizontal" method="post"
                                action="{{ url('/admin/post/update/' . $post->id) }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Post Title</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="title" class="form-control" name="title"
                                                placeholder="Post Title" required="required" value="{{ $post->title }}">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Post Body</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="body" required="required">{{ $post->body }}</textarea>
                                        </div>


                                        <div class="col-md-2">
                                            <h6>Post Category</h6>

                                        </div>
                                        <fieldset class="col-md-10 form-group">
                                            <select class="form-select" id="basicSelect" name="category_id">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        @if ($cat->id == $post->category_id) selected @endif>
                                                        {{ $cat->name }}</option>
                                                @endforeach


                                            </select>
                                        </fieldset>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="{{ route('admin.allPosts') }}"
                                                class="btn btn-warning me-1 mb-1">Back</a>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->


    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-612col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Post Image</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="post"
                                action="{{ url('/admin/post/image-update/' . $post->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <img src="{{ asset('images/posts/' . $post->image) }}" width="250"
                                                height="170" />
                                            <br><br>
                                        </div>


                                        <div class="col-md-2">
                                            <label>Change Post Image</label>
                                        </div>
                                        <div class="col-md-5 form-group">

                                            <fieldset>
                                                <div class="input-group mb-3">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupFile01"><i
                                                                class="bi bi-upload"></i></label>
                                                        <input type="file" class="form-control" id="inputGroupFile01"
                                                            name="image" accept="image/*" required="required">
                                                    </div>
                                                </div>

                                            </fieldset>

                                        </div>



                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="{{ route('admin.allPosts') }}"
                                                class="btn btn-warning me-1 mb-1">Back</a>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update Image</button>

                                        </div>
                                    </div>
                                    </c:forEach>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('js')
        <script type="text/javascript">
            var element = document.getElementById("posts");
            element.classList.add("active");
            var element = document.getElementById("postExpand");
            element.classList.add("active");
        </script>
    @endpush
@endsection
