@extends('admin.layout')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Service</h5>
                    @include('admin.include.error')
                    @include('admin.include.internalError')
                    @include('admin.include.serverError')
                    @include('admin.include.message')
                    <form id="serviceForm" action="{{ route('admin.service.add') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" id="title" type="text" class="form-control"
                                    value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Arabic Title</label>
                            <div class="col-sm-10">
                                <input dir="rtl" name="arabic_title" id="arabic_title" type="text" class="form-control"
                                    value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea id="short_description" name="short_description" form="serviceForm"
                                    class="form-control"
                                    style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Arabic Short Description</label>
                            <div class="col-sm-10">
                                <textarea dir="rtl" id="arabic_short_description" name="arabic_short_description"
                                    form="serviceForm" class="form-control"
                                    style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Long Description Image</label>
                            <div class="col-sm-10">
                                <input name="long_description_image" id="long_description_image" class="form-control"
                                    type="file" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Long Description Sub Image</label>
                            <div class="col-sm-10">
                                <input name="long_description_sub_image" id="long_description_sub_image"
                                    class="form-control" type="file" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputColor" class="col-sm-2 col-form-label">Long Description Title Color</label>
                            <div class="col-sm-10">
                                <input name="long_description_title_color" id="title_color" type="color"
                                    class="form-control form-control-color" id="exampleColorInput"
                                    title="Choose your color" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="long_description" class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea id="long_description" name="long_description" form="serviceForm"
                                    class="form-control" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="arabic_long_description" class="col-sm-2 col-form-label">Arabic Long Description</label>
                            <div class="col-sm-10">
                                <textarea id="arabic_long_description" name="arabic_long_description" form="serviceForm"
                                    class="form-control"
                                    style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
