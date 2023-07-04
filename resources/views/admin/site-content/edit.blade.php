@extends('admin.layout')
@section('content')
    <section class="section" dir="rtl" style="font-family: 'Segoe UI',sans-serif">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-header text-primary" style="font-family: 'Segoe UI',sans-serif">محتوى
                            الموقع</h3>
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

                        <form id="serviceForm" action="{{ route('admin.site_content.update') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="facebook" class="col-sm-2 col-form-label">رابط فيسبوك</label>
                                <div class="col-sm-10">
                                    <input name="facebook" id="facebook" type="text"
                                           class="form-control @error('facebook') is-invalid @enderror"
                                           value="{{old('facebook') ?? ($sc->facebook ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">رابط تويتر</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="twitter" id="twitter" type="text"
                                           class="form-control @error('twitter') is-invalid @enderror"
                                           value="{{old('twitter') ?? ($sc->twitter ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="youtube" class="col-sm-2 col-form-label">رابط يوتيوب</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="youtube" id="youtube" type="text"
                                           class="form-control @error('youtube') is-invalid @enderror"
                                           value="{{old('youtube') ?? ($sc->youtube ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="whatsapp" class="col-sm-2 col-form-label">رابط واتساب</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="whatsapp" id="whatsapp" type="text"
                                           class="form-control @error('whatsapp') is-invalid @enderror"
                                           value="{{old('whatsapp') ?? ($sc->whatsapp ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telegram" class="col-sm-2 col-form-label">رابط تيلغرام</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="telegram" id="telegram" type="text"
                                           class="form-control @error('telegram') is-invalid @enderror"
                                           value="{{old('telegram') ?? ($sc->telegram ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="instgram" class="col-sm-2 col-form-label">رابط انستغرام</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="instgram" id="instgram" type="text"
                                           class="form-control @error('instgram') is-invalid @enderror"
                                           value="{{old('instgram') ?? ($sc->instgram ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="snapchat" class="col-sm-2 col-form-label">رابط سناب شات</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="snapchat" id="snapchat" type="text"
                                           class="form-control @error('snapchat') is-invalid @enderror"
                                           value="{{old('snapchat') ?? ($sc->snapchat ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tiktok" class="col-sm-2 col-form-label">رابط تيكتوك</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="tiktok" id="tiktok" type="text"
                                           class="form-control @error('tiktok') is-invalid @enderror"
                                           value="{{old('tiktok') ?? ($sc->tiktok ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="footer_quot" class="col-sm-2 col-form-label">عبارة دعائية (العبارة أسفل
                                    الشعار)</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="footer_quot" id="footer_quot" type="text"
                                           class="form-control @error('footer_quot') is-invalid @enderror"
                                           value="{{old('footer_quot') ?? ($sc->footer_quot ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number" class="col-sm-2 col-form-label">رقم التواصل</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="phone_number" id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           value="{{old('phone_number') ?? ($sc->phone_number ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="email" id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{old('email') ?? ($sc->email ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">العنوان</label>
                                <div class="col-sm-10">
                                    <input dir="rtl" name="address" id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           value="{{old('address') ?? ($sc->address ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">شعار الموقع</label>
                                <div class="col-sm-10">
                                    <input name="logo" id="logo"
                                           class="form-control  @error('logo') is-invalid @enderror"
                                           type="file" value="{{old('logo') ?? ($sc->logo ?? null)}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>
                                <div class="col-sm-10">
                                    <input name="favicon" id="favicon"
                                           class="form-control  @error('favicon') is-invalid @enderror"
                                           type="file"
                                           value="{{old('favicon') ?? ($sc->favicon ?? null)}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">محتوى صفحة حول</h5>

                                            <!-- TinyMCE Editor -->
                                            <textarea class="tinymce-editor" name="about">
                                            {{old('about') ?? ($sc->about ?? null)}}
                                        </textarea><!-- End TinyMCE Editor -->

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">محتوى صفحة التواصل</h5>

                                            <!-- TinyMCE Editor -->
                                            <textarea class="tinymce-editor" name="contact_content">
                                            {{old('contact_content') ?? ($sc->contact_content ?? null)}}
                                        </textarea><!-- End TinyMCE Editor -->

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">محتوى صفحة الأحكام و الشروط</h5>
                                            <!-- TinyMCE Editor -->
                                            <textarea class="tinymce-editor" name="terms_conditions">
                                            {!!old('terms_conditions') ?? ($sc->terms_conditions ?? null)!!}
                                        </textarea><!-- End TinyMCE Editor -->
                                        </div>
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
