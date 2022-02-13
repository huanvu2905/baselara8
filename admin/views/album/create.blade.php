@extends('admin::layouts.main')

@section('title', __('Thêm mới album'))

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

@if (isset($errors) && count($errors))

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }} </li>
    @endforeach
</ul>

@endif

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('admin.album.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name_vi">Tên album tiếng Việt </label>
                                    <input 
                                        id="name_vi" 
                                        name="name[vi]" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Việt..."
                                        maxlength="127"
                                        value="{{ old('name[vi]') }}"
                                    >
                                    {!! $errors->first('name.vi', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                <div class="mb-3">
                                    <label for="name_en">Tên album tiếng Anh</label>
                                    <input 
                                        id="name_en" 
                                        name="name[en]" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Anh..."
                                        maxlength="127"
                                        value="{{ old('name[en]') }}"
                                    >
                                    {!! $errors->first('name.en', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                <div class="mb-3">
                                    <label for="name_fr">Tên album tiếng Pháp</label>
                                    <input 
                                        id="name_fr" 
                                        name="name[fr]" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Pháp..."
                                        maxlength="127"
                                        value="{{ old('name[fr]') }}"
                                    >
                                    {!! $errors->first('name.fr', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="control-label">Danh mục</label>
                                    <select class="form-control select2" name="category">
                                        <option value="">Danh mục gốc</option>
                                        {!! $treeHtml !!}
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
                                                maxlength="512">{{ nl2br_e(old('description[vi]')) }}</textarea>
                                        </div>
                                        <div class="tab-pane" id="enDesc" role="tabpanel">
                                            <textarea 
                                                class="form-control" 
                                                name="description[en]" 
                                                rows="5" 
                                                maxlength="512">{{ nl2br_e(old('description[en]')) }}</textarea>
                                        </div>
                                        <div class="tab-pane" id="frDesc" role="tabpanel">
                                            <textarea 
                                                class="form-control" 
                                                name="description[fr]" 
                                                rows="5" 
                                                maxlength="512">{{ nl2br_e(old('description[fr]')) }}</textarea>
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
                            <div class="text-muted text-center p-4 empty">Chưa có ảnh nào</div>
                            <div class="text-muted text-center p-4 default-message d-none"></div>
                            <input id="default-image" type="hidden" name="first_image" value="">
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
                                <input id="metatitle" name="meta_title" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="meta_keyword" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" name="meta_description"></textarea>
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

                    <img id="previewImg" src="" alt="Placeholder" style="display: none; max-height: 300px">
                </div>
    
            </div> <!-- end card-->
            <div class="row">
            <div class="col-sm-6 mb-4">
                <label class="col-form-label col-lg-4">Tình trạng</label>
                <div class="col-form-label col-lg-8">
                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckSizesm1" name="active" value="1" checked>
                        <label class="form-check-label" for="SwitchCheckSizesm1">Hoạt động</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-4">
                <label class="col-form-label col-lg-4">Cho phép bình luận</label>
                <div class="col-form-label col-lg-8">
                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input class="form-check-input" type="checkbox" id="SwitchCheckSizesm2" name="is_comment_enabled" value="1">
                        <label class="form-check-label" for="SwitchCheckSizesm2">OK</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                <button type="reset" class="btn btn-secondary waves-effect waves-light">Cancel</button>
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