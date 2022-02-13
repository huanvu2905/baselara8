@extends('admin::layouts.main')

@section('title', __('Thêm mới danh mục '))

@section('head-css')
@endsection

@section('content')   
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thêm mới ý kiến khách hàng</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Ý kiến</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('admin.testimony.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name_vi">Tên </label>
                                    <input 
                                        id="title" 
                                        name="title" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Nguyễn Thuỳ Trang..."
                                        maxlength="127"
                                        value="{{ old('title') }}"
                                    >
                                    {!! $errors->first('title', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                                <div class="mb-3">
                                    <label for="description">Mô tả</label>
                                    <input 
                                        id="description" 
                                        name="description" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="CEO TranSpa..."
                                        maxlength="127"
                                        value="{{ old('description') }}"
                                    >
                                    {!! $errors->first('description', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="description">Nội dung</label>
                                <textarea 
                                    class="mi-area" 
                                    rows="5" 
                                    style="width: 100%"
                                    name="content">{{ nl2br_e(old('content')) }}</textarea>
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
@endsection