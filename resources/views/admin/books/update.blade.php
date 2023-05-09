@extends('admin.layout')
@section('content')
    <section class="section" dir="rtl" style="font-family: 'Segoe UI',sans-serif">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-header text-primary" style="font-family: 'Segoe UI',sans-serif">التعديل على كتاب</h3>
                        @if($errors->any())
                            <div class="card p-1">
                                <div class="card-body">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li style="color: red">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form id="serviceForm" action="{{ route('admin.books.update' , $book->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                                <div class="col-sm-10">
                                    <input name="name" id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{old('name') ?? $book->name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="author_name" class="col-sm-2 col-form-label">اسم المؤلف</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="author_name" id="author_name" type="text"
                                           class="form-control @error('author_name') is-invalid @enderror"
                                           value="{{old('author_name') ?? $book->author_name}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="publisher" class="col-sm-2 col-form-label">الناشر</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="publisher" id="publisher" type="text"
                                           class="form-control @error('publisher') is-invalid @enderror"
                                           value="{{old('publisher') ?? $book->publisher}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="small_description" class="col-sm-2 col-form-label">الشرح القصير</label>
                                <div class="col-sm-10">
                                <textarea id="small_description" name="small_description" form="serviceForm"
                                          class="form-control @error('small_description') is-invalid @enderror"
                                          style="height: 100px">{{old('small_description') ?? $book->small_description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="long_description" class="col-sm-2 col-form-label">الشرح الطويل</label>
                                <div class="col-sm-10">
                                <textarea dir="rtl" id="long_description" name="long_description"
                                          form="serviceForm"
                                          class="form-control @error('long_description') is-invalid @enderror"
                                          style="height: 100px">{{old('long_description') ?? $book->long_description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="face_image" class="col-sm-2 col-form-label">صورة الغلاف</label>
                                <div class="col-sm-10">
                                    <input name="face_image" id="face_image"
                                           class="form-control  @error('face_image') is-invalid @enderror"
                                           type="file" value="{{old('face_image') ?? $book->face_image}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="publish_date" class="col-sm-2 col-form-label">تاريخ النشر</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="publish_date" id="publish_date" type="date"
                                           class="form-control @error('publish_date') is-invalid @enderror"
                                           value="{{old('publish_date') ?? $book->publish_date}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">السعر</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="price" id="price" type="number" step="any"
                                           class="form-control @error('price') is-invalid @enderror"
                                           value="{{old('price') ?? $book->price}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 border border-primary">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_original"
                                               id="original"
                                               value="{{1}}" @checked($book->is_original)>
                                        <label class="form-check-label" for="original">
                                            نسخة أصلية
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 border border-primary">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_original"
                                               id="not-original"
                                               value="{{0}}" @checked(!$book->is_original)>
                                        <label class="form-check-label" for="not-original">
                                            نسخة غير أصلية
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 p-4 text-center">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
