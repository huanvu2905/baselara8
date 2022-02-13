@extends('admin::layouts.main')

@section('title', __('Chỉnh sửa danh mục bài viết'))

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
            <h4 class="mb-sm-0 font-size-18">Chỉnh sửa bài viết</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.top.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Bài viết</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

@include('admin::layouts.partials.message')

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name">Tên bài viết tiếng Việt </label>
                                    <input 
                                        id="name" 
                                        name="name" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Tên Tiếng Việt..."
                                        maxlength="127"
                                        value="{{ old('name', \Arr::get($post, 'name')) }}"
                                    >
                                    {!! $errors->first('name', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                <div class="mb-3">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#viDesc" role="tab" aria-selected="true">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Mô tả nhanh bài viết</span>    
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content p-1 text-muted">
                                        <div class="tab-pane active" id="viDesc" role="tabpanel">
                                            <textarea 
                                                class="form-control" 
                                                name="description" 
                                                rows="5" 
                                                maxlength="512">{{ nl2br_e(old('description', \Arr::get($post, 'description'))) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="col-10 mb-3">
                                    <label class="control-label">Danh mục</label>
                                    <select class="form-control select2" name="category">
                                        <option value="">Danh mục gốc</option>
                                        {!! $treeHtmlSelected !!}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#viContent" role="tab" aria-selected="true">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Nội dung tiếng Việt</span> 
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="viContent" role="tabpanel">
                                            <textarea id="vi-area" class="mi-area" name="content">{{ htmlspecialchars_decode(old('content', \Arr::get($post, 'content'))) }}</textarea>
                                            {!! $errors->first('content', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                        </div>
                                    </div>
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
                                <input id="metatitle" name="meta_title" type="text" value="{{ old('meta_title', $post->meta_title) }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="metakeywords">Meta Keywords</label>
                                <input id="metakeywords" name="meta_keyword" type="text" value="{{ old('meta_keyword', $post->meta_keyword) }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Meta Description</label>
                                <textarea class="form-control" id="metadescription" rows="5" name="meta_description">{{ old('meta_description', $post->meta_description) }}</textarea>
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

                    <img id="previewImg" src="{{ asset('storage/' .$post->image) }}" alt="Placeholder" style="display: block; max-height: 300px">
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
                            {{ \Arr::get($post, 'active') == 1 ? 'checked' : '' }}
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
                            {{ \Arr::get($post, 'is_comment_enabled') == 1 ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="SwitchCheckSizesm2">OK</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                <a href="{{ route('admin.post.index') }}" class="btn btn-secondary waves-effect waves-light">Cancel</a>
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

    $(document).ready(function () {
        var url = '{{ route("admin.post.content.upload") }}';
        var appUrl = '{{ url('/') }}';
        0 < $("#vi-area").length &&
        tinymce.init({
            selector: "textarea#vi-area",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code media nonbreaking",
                "save table directionality paste",
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                { title: "Bold text", inline: "b" },
                { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                { title: "Example 1", inline: "span", classes: "example1" },
                { title: "Example 2", inline: "span", classes: "example2" },
                { title: "Table styles" },
                { title: "Table row 1", selector: "tr", classes: "tablerow1" },
            ],
            images_upload_url: url,
            images_upload_base_path: appUrl,
            images_upload_credentials: true,
            relative_urls : false,
            remove_script_host : false,
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', url);
                xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");

                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            }
        });
});

</script>
@endsection