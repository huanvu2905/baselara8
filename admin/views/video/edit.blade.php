@extends('admin::layouts.main')

@section('title', __('Chỉnh sửa video'))

@section('head-css')
    <!-- select2 css -->
    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')   
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Add Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

@include('admin::layouts.partials.message')

@if (isset($errors) && count($errors))

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }} </li>
    @endforeach
</ul>

@endif

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('admin.video.update', $video->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name_vi">Tên video tiếng Việt </label>
                                    @php
                                        $viTrans = $trans->where('lang', 'vi')->first();
                                        $viTransName = \Arr::get($viTrans, 'name');
                                    @endphp
                                    <input 
                                        id="name_vi" 
                                        name="name[vi]" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Việt..."
                                        maxlength="127"
                                        value="{{ old('name[vi]', $viTransName) }}"
                                    >
                                    {!! $errors->first('name.vi', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                <div class="mb-3">
                                    <label for="name_en">Tên video tiếng Anh</label>
                                    @php
                                        $enTrans = $trans->where('lang', 'en')->first();
                                        $enTransName = \Arr::get($enTrans, 'name');
                                    @endphp
                                    <input 
                                        id="name_en" 
                                        name="name[en]" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Anh..."
                                        maxlength="127"
                                        value="{{ old('name[en]', $enTransName) }}"
                                    >
                                    {!! $errors->first('name.en', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                <div class="mb-3">
                                    <label for="name_fr">Tên video tiếng Pháp</label>
                                    @php
                                        $frTrans = $trans->where('lang', 'fr')->first();
                                        $frTransName = \Arr::get($frTrans, 'name');
                                    @endphp
                                    <input 
                                        id="name_fr" 
                                        name="name[fr]" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Pháp..."
                                        maxlength="127"
                                        value="{{ old('name[fr]', $frTransName) }}"
                                    >
                                    {!! $errors->first('name.fr', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="control-label">Danh mục</label>
                                    <select class="form-control select2" name="category">
                                        <option value="">Danh mục gốc</option>
                                        {!! $treeHtmlSelected !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name_fr">Link</label>
                                    <input 
                                        id="link" 
                                        name="link" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Link youtube..."
                                        maxlength="127"
                                        value="{{ old('link', $video->link) }}"
                                    >
                                    {!! $errors->first('link', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                
                            </div>
                        </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Meta Data</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Meta title</label>
                                <input id="metatitle" name="meta_title" type="text" value="{{ old('meta_title', $video->meta_title) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="meta_keyword" type="text" value="{{ old('meta_keyword', $video->meta_keyword) }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" name="meta_description">{{ old('meta_description', $video->meta_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Ảnh đại diện</h4>
    
                    <input type="file" name="image" onchange="previewFile(this);" accept="image/gif, image/jpg, image/jpeg, image/png">
                    {!! $errors->first('image', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}

                    <img id="previewImg" src="{{ asset('storage/' .$video->image) }}" alt="Placeholder" style="display: block; max-height: 300px">
                </div>
    
            </div> <!-- end card-->
            <div class="row">
            <div class="col-sm-6 mb-4">
                <label class="col-form-label col-lg-4">Tình trạng</label>
                <div class="col-form-label col-lg-8">
                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="SwitchCheckSizesm1" 
                            name="active" 
                            value="1" 
                            {{ \Arr::get($video, 'active') == 1 ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="SwitchCheckSizesm1">Hoạt động</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-4">
                <label class="col-form-label col-lg-4">Cho phép bình luận</label>
                <div class="col-form-label col-lg-8">
                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="SwitchCheckSizesm2" 
                            name="is_comment_enabled" 
                            value="1"
                            {{ \Arr::get($video, 'is_comment_enabled') == 1 ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="SwitchCheckSizesm2">OK</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                <a href="{{ route('admin.video.index') }}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
            </div>
        </form>
    </div>
</div>
<!-- end row -->

@endsection

@section('page-js')
<!-- select 2 plugin -->
<script src="{{ asset('admin/assets/libs/select2/js/select2.min.js') }}"></script>
<!--tinymce js-->
<script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>

<script type="text/javascript">
    $(".select2").select2();

    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result).css('display', 'block');
            }
 
            reader.readAsDataURL(file);
        }
    }

</script>
@endsection