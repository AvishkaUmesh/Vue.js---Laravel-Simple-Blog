@extends('layouts.app')

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-612col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Post</h4>

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

                            <form class="form form-horizontal" method="post" action="{{ route('store.post') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Post Title</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="title" class="form-control" name="title"
                                                placeholder="Post Title" required="required">
                                        </div>

                                        <div class="col-md-2">
                                            <label>Post Body</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="body" required="required"></textarea>
                                        </div>


                                        <div class="col-md-2">
                                            <h6>Post Category</h6>

                                        </div>
                                        <fieldset class="col-md-10 form-group">
                                            <select class="form-select" id="basicSelect" name="category_id">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach


                                            </select>
                                        </fieldset>


                                        <div class="col-md-2">
                                            <label>Post Image</label>
                                        </div>
                                        <div class="col-md-10 form-group">

                                            <fieldset>
                                                <div class="input-group mb-3">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupFile01"><i
                                                                class="bi bi-upload"></i></label>
                                                        <input type="file" class="form-control" id="inputGroupFile01"
                                                            name="image" accept="image/*">
                                                    </div>
                                                </div>

                                            </fieldset>

                                        </div>



                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Add</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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


    @push('js')
        <script type="text/javascript">
            var element = document.getElementById("posts");
            element.classList.add("active");
            var element = document.getElementById("postExpand");
            element.classList.add("active");
            var element = document.getElementById("addPost");
            element.classList.add("active");
        </script>
    @endpush
@endsection
