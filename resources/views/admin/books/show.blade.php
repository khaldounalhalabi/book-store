@extends('admin.layout')
@section('content')
    <div class="page-title" dir="rtl">
        <h1 class=""></h1>
        <h2>{{$book->name}}</h2>
    </div>
    <section class="section profile" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content p-2">
                            <div class="pb-3">
                                <a href="{{route('admin.books.edit' , $book->id)}}" class="p-2">
                                    <button class="btn btn-primary">تعديل</button>
                                </a>
                            </div>


                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الاسم :</div>
                                <div class="col-lg-9 col-md-8 label border border-dark-subtle">{{$book->name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> اسم المؤلف :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$book->author_name}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الناشر :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$book->publisher}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> تاريخ النشر :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$book->publish_date}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الكمية :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$book->quantity}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> السعر :</div>
                                <div class="col-lg-9 col-md-8 label border border-dark-subtle">{{$book->price}}</div>
                            </div>

                            <div class="row">
                                <div class="mb-3 p-3 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="small_description-textarea">شرح قصير</label>
                                        <textarea class="form-control" id="small_description-textarea"
                                                  rows="3" readonly>{{$book->small_description}}</textarea>
                                        <script type="module">
                                            let textareaElement = $('#small_description-textarea');
                                            let textareaContent = textareaElement.val();
                                            let strippedContent = $('<div>').html(textareaContent).text();
                                            textareaElement.val(strippedContent);
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 p-3 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="long_description-textarea">شرح طويل</label>
                                        <textarea class="form-control" id="long_description-textarea"
                                                  rows="3" readonly>{{$book->long_description}}</textarea>
                                        <script type="module">
                                            let textareaElement = $('#long_description-textarea');
                                            let textareaContent = textareaElement.val();
                                            let strippedContent = $('<div>').html(textareaContent).text();
                                            textareaElement.val(strippedContent);
                                        </script>
                                    </div>
                                </div>
                            </div>


                            <div class="p-2">
                                <div class="gallery">
                                    <div class="image-container">
                                        <a href="{{asset("storage/$book->face_image")}}" data-lightbox="image-1"
                                           data-title="My caption" class="grid-img-item p-3 m-2">
                                            <img src="{{asset("storage/$book->face_image")}}"
                                                 class="grid-img-item p-3 m-2">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
