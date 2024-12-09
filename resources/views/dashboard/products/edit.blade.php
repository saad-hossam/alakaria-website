@extends('layouts.dashbord.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل المنتج</h4>
            </div>
        </div>
        @can('product-list')

        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('products.index') }}">جميع المنتجات</a>

        </div>
        @endcan
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{ route('products.photo.store') }}" class="needs-validation "
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6">
                                <label class="form-label h5">المرفقات</label>
                                <div class="form-group">
                                    <input class="form-control"type="text" name="id" value="{{ $product->id }}"
                                        style="display: none">
                                    <input class=" form-control-sm"type="file" name="photo[]" id="photo" multiple>
                                    <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                                </div><!-- main-form-group -->


                            </div>


                        </div>
                    </form>
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover  text-md-nowrap" id="example1" data-page-length='50'
                            style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-20p border-bottom-0"></th>
                                    <th class="wd-10p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->photos as $photo)
                                    <tr>

                                        <td style=" text-align:right "> <a type="image" target="_blank"
                                                href="{{ '/images/products/attachments/' . $photo->src }}">
                                                <img class="rounded float-start h-25" style="max-width:30px; max-height:30px"
                                                    src="{{ '/images/products/attachments/' . $photo->src }}">
                                            </a></td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-danger"
                                                data-effect="effect-scale" data-user_id="{{ $photo->id }}"
                                                data-username="الصوره"
                                                data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form method="post" action="{{ route('products.update', $product->id) }}" class="needs-validation " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                                id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                                                aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <label> الاسم-- {{ $lang }}</label>
                                                <input type="text" name="{{ $key }}[name]" class="form-control"
                                                    placeholder="الاسم" value="{{ $product->translate($key)->name }}">
                                            </div>
                                            <div class="form-group mt-3 col-md-12">
                                                <label> الاسم-- {{ $lang }}</label>
                                                <textarea id="Product_description_{{ $key }}" name="{{ $key }}[description]" class="form-control"
                                                    placeholder="Textarea" rows="5">{!! $product->translate($key)->description !!}</textarea>
                                            </div>
                                            <div class="form-group mt-3 col-md-12">
                                                <label> الاسم-- {{ $lang }}</label>
                                                <textarea id="Product_body_{{ $key }}" name="{{ $key }}[body]" class="form-control"
                                                    placeholder="Textarea" rows="5">{!! $product->translate($key)->body !!}</textarea>

                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5"> سعر المنتج </label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="سعر المنتج" type="number" name="price"
                                        value="{{ $product->price }}">
                                </div><!-- main-form-group -->
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="category_id">اختار القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="category_id" name="category_id">
                                        @foreach ($categories as $category)
                                            @if ($product->category_id == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله العميل</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        @if ($product->status == 'active')
                                            <option value="active" selected>مفعل</option>
                                            <option value="disabled">غير مفعل</option>
                                        @else
                                            <option value="active">مفعل</option>
                                            <option value="disabled" selected>غير مفعل</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="ckbox"><input name="sale" value="true"
                                        @if ($product->sale == 'onsale') {{ 'checked' }} @endif
                                        type="checkbox"><span>خصومات</span></label>


                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الصوره</label>
                                <div class="form-group">
                                    <input name="image" type="file" class="dropify" data-height="200" multiple />
                                    <a type="image" target="_blank"
                                        href="{{ '/images/products/layout/' . $product->image }}">
                                        <img class="rounded float-start h-25" style="max-width:30px; max-height:30px"
                                            src="{{ '/images/products/layout/' . $product->image }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#Product_description_ar'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#Product_body_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#Product_body_ar'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#Product_description_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
