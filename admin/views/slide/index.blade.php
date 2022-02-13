@extends('admin::layouts.main')

@section('title', __('Thêm mới slide'))

@section('head-css')
    <!-- select2 css -->
    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')   
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Chỉnh sửa slide</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.top.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Slide</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-9">
        <div class="card border border-primary">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.slide.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if( ! $slide)
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Tiêu đề</label>
                            <div class="col-lg-8">
                                <input 
                                    id="title" 
                                    name="title" 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Bác sỹ Vũ Thơm"
                                    maxlength="127"
                                    value="{{ old('title', \Arr::get($slide, 'title')) }}"
                                >
                                {!! $errors->first('title', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Mô tả</label>
                            <div class="col-lg-8">
                                <input 
                                    id="description" 
                                    name="description" 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="HÃY TÌM HIỂU VỀ BỆNH LÝ VÀ NHẬN TƯ VẤN"
                                    maxlength="127"
                                    value="{{ old('description') }}"
                                >
                                {!! $errors->first('description', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Nội dung</label>
                            <div class="col-lg-8">
                                <textarea 
                                    class="form-control" 
                                    name="content" 
                                    rows="5" 
                                    maxlength="512">{{ nl2br_e(old('content')) }}</textarea>
                                {!! $errors->first('content', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
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

                    @else 
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Tiêu đề</label>
                        <div class="col-lg-8">
                            <input 
                                id="title" 
                                name="title" 
                                type="text" 
                                class="form-control" 
                                placeholder="Bác sỹ Vũ Thơm"
                                maxlength="127"
                                value="{{ old('title', \Arr::get($slide, 'title')) }}"
                            >
                            {!! $errors->first('title', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Mô tả</label>
                        <div class="col-lg-8">
                            <input 
                                id="description" 
                                name="description" 
                                type="text" 
                                class="form-control" 
                                placeholder="HÃY TÌM HIỂU VỀ BỆNH LÝ VÀ NHẬN TƯ VẤN"
                                maxlength="127"
                                value="{{ old('description', \Arr::get($slide, 'description')) }}"
                            >
                            {!! $errors->first('description', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Nội dung</label>
                        <div class="col-lg-8">
                            <textarea 
                                class="form-control" 
                                name="content" 
                                rows="5" 
                                maxlength="512">{{ nl2br_e(old('content')) }}{{ old('content', \Arr::get($slide, 'content')) }}</textarea>
                            {!! $errors->first('content', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Ảnh đại diện</h4>
            
                            <input type="file" name="image" onchange="previewFile(this);" accept="image/gif, image/jpg, image/jpeg, image/png">
                            {!! $errors->first('image', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
        
                            <img id="previewImg" src="{{ asset('storage/' .$slide->image) }}" alt="Placeholder" style="display: block; max-height: 300px; max-width:1024px">
                        </div>
            
                    </div> <!-- end card-->
                    @endif
                    

                    <div class="row mb-4">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection

@section('page-js')
<!-- select 2 plugin -->
<script src="{{ asset('admin/assets/libs/select2/js/select2.min.js') }}"></script>

<script type="text/javascript">
    $(".select2").select2();
</script>
<script type="text/javascript">
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