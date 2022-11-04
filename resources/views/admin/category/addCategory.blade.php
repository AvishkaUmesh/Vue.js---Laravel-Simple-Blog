@extends('layouts.app')
@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-612col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    <div class="card-content">

                        {{-- <% if (request.getAttribute("success") != null ) {%>
							 <div class="alert alert-light-success color-success alert-dismissible fade show" role="alert">
                            <center><i class="bi bi-check-circle"> </i> Game added successfully </center>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
				<%}%> --}}

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


                            <form class="form form-horizontal" method="post" action="{{ route('store.category') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Category Name</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="name" class="form-control" name="name"
                                                placeholder="Category Name" required="required">
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
            var element = document.getElementById("category");
            element.classList.add("active");
            var element = document.getElementById("categoryExpand");
            element.classList.add("active");
            var element = document.getElementById("addCategory");
            element.classList.add("active");
        </script>
    @endpush
@endsection
