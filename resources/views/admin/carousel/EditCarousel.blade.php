@extends('admin.layout')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">The Slider in the top of the page (The Carousel)</h5>
                    <!-- General Form Elements -->
                    <form action="{{ route('admin.carousel.doEdit' , ['id' => $carousel->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.include.error')
                    @include('admin.include.internalError')
                    @include('admin.include.message')
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Image Title</label>
                            <div class="col-sm-10">
                                <input name="title" id="title" type="text" class="form-control" value="{{ $carousel->title }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Arabic Image Title</label>
                            <div class="col-sm-10">
                                <input dir = "rtl" name="arabic_title" id="arabic_title" type="text" class="form-control" value="{{ $carousel->title }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputColor" class="col-sm-2 col-form-label">Title Color</label>
                            <div class="col-sm-10">
                                <input name="title_color" id="title_color" type="color" class="form-control form-control-color" id="exampleColorInput" title="Choose your color" value="{{ $carousel->title_color }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input name="image" id="image" class="form-control" type="file" id="formFile" value = "{{ $carousel->image }}">
                            </div>
                        </div>
                        <a href=""></a>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>
                    </form>
                    <!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
