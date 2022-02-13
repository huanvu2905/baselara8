@extends('admin::layouts.main')

@section('title', __('Chỉnh sửa album'))

@section('head-css')
    <!-- select2 css -->
    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" id="u0" href="{{ asset('admin/assets/libs/tinymce/skins/ui/oxide/skin.min.css') }}">
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
        <form method="POST" action="{{ route('admin.album.update', $album->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name_vi">Tên album tiếng Việt </label>
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
                                    <label for="name_en">Tên album tiếng Anh</label>
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
                                    <label for="name_fr">Tên album tiếng Pháp</label>
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
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#viDesc" role="tab" aria-selected="true">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Mô tả nhanh album tiếng Việt</span>    
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#enDesc" role="tab" aria-selected="false">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Mô tả nhanh album tiếng Anh</span>    
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#frDesc" role="tab" aria-selected="false">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">Mô tả nhanh album tiếng Pháp</span>    
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content p-1 text-muted">
                                        <div class="tab-pane active" id="viDesc" role="tabpanel">
                                            <textarea 
                                                class="form-control" 
                                                name="description[vi]" 
                                                rows="5" 
                                                maxlength="512">{{ nl2br_e(old('description[vi]', \Arr::get($viTrans, 'description'))) }}</textarea>
                                        </div>
                                        <div class="tab-pane" id="enDesc" role="tabpanel">
                                            <textarea 
                                                class="form-control" 
                                                name="description[en]" 
                                                rows="5" 
                                                maxlength="512">{{ nl2br_e(old('description[en]', \Arr::get($enTrans, 'description'))) }}</textarea>
                                        </div>
                                        <div class="tab-pane" id="frDesc" role="tabpanel">
                                            <textarea 
                                                class="form-control" 
                                                name="description[fr]" 
                                                rows="5" 
                                                maxlength="512">{{ nl2br_e(old('description[fr]', \Arr::get($frTrans, 'description'))) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thư Viện Ảnh</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div id="drag-and-drop-zone" class="dm-uploader p-5 text-center" style="border: 0.25rem dashed #A5A5C7;">
                                <h4 class="mt-4 text-muted">Kéo &amp; thả ảnh ở đây</h4>
                                <h6 class="mb-5 text-muted">(Dung lượng ảnh tối đa là 3MB. Các định dạng ảnh cho phép là "JPG", "JPEG" hoặc "PNG")</h6>
                                <div class="btn btn-primary btn-block mb-4">
                                    <span>Chọn ảnh từ máy tính</span>
                                    <input type="file" title="Click to add Files" multiple="" />
                                </div>
                            </div>
                        </div>
            
                        <div id="uploaded-files" class="col-12">
                            @if (! empty($album->images) && ! $album->images->isEmpty())
                                @foreach ($album->images as $image)
                                <div class="preview-template p-4 m-2" id="UploadedFile{{ $image->id }}" data-file-id="{{ $image->id }}">
                                    <div class="preview-box text-center mb-2">
                                        <img class="preview-img" src="{{ $image->image_url }}" />
                                    </div>
                                    <div class="media-body mb-2">
                                        <p class="mb-2">
                                            Trạng thái: <span class="text-muted">Đã upload</span>
                                        </p>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-primary bg- bg-success" role="progressbar" style="width: 100%;"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-warning btn-block remove">Xóa ảnh này</button>
                                        <input type="hidden" class="uploaded-image" name="images[{{ $image->id }}]" value="{{ $image->path }}">
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="text-muted text-center p-4 empty">Chưa có ảnh nào</div>
                            <div class="text-muted text-center p-4 default-message d-none"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/html" id="files-template">
                <div class="preview-template p-4 m-2">
                    <div class="preview-box text-center mb-2">
                        <img class="preview-img" src="https://via.placeholder.com/240.png" alt="Generic placeholder image">
                    </div>
                    <div class="media-body mb-2">
                        <p class="mb-2">
                            Trạng thái: <span class="text-muted">Đang đợi upload</span>
                        </p>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-warning btn-block remove">Xóa ảnh này</button>
                        <input type="hidden" class="uploaded-image" name="images[%%fileid%%]" value="">
                    </div>
                </div>
            </script>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Meta Data</h4>
                    <p class="card-title-desc">Fill all information below</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Meta title</label>
                                <input id="metatitle" name="meta_title" type="text" value="{{ old('meta_title', $album->meta_title) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="meta_keyword" type="text" value="{{ old('meta_keyword', $album->meta_keyword) }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" name="meta_description">{{ old('meta_description', $album->meta_description) }}</textarea>
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

                    <img id="previewImg" src="{{ asset('storage/' .$album->image) }}" alt="Placeholder" style="display: block; max-height: 300px">
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
                            {{ \Arr::get($album, 'active') == 1 ? 'checked' : '' }}
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
                            {{ \Arr::get($album, 'is_comment_enabled') == 1 ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="SwitchCheckSizesm2">OK</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                <a href="{{ route('admin.album.index') }}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
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

@push('css')
<link href="{{ asset('_admin/css/icheck-bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('_admin/css/jquery.dm-uploader.min.css') }}" rel="stylesheet">
<link href="{{ asset('_admin/css/uploader.css') }}" rel="stylesheet">
@endpush

@push('js')
<script type="text/javascript"> var UPLOAD_URL = "{{ route('admin.album.upload') }}"; </script>
<script src="{{ asset('_admin/js/jquery.dm-uploader.min.js') }}"></script>
<script src="{{ asset('_admin/js/uploader.js') }}"></script>
@endpush