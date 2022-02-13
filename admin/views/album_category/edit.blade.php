@extends('admin::layouts.main')

@section('title', __('Chỉnh sửa danh mục album'))

@section('head-css')
    <!-- select2 css -->
    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')   
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Basic Tables</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Basic Tables</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

@include('admin::layouts.partials.message')

<div class="row">
    <div class="col-lg-9">
        <div class="card border border-primary">
            <div class="card-body">
                <h4 class="card-title mb-4">Chỉnh sửa danh mục album</h4>
                <form method="POST" action="{{ route('admin.album_category.update', $albumCategory->id) }}" >
                    @csrf
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Tên danh mục</label>
                        <label for="name_vi" class="col-form-label col-lg-2">Tiếng Việt</label>
                        <div class="col-lg-8">
                            @php
                                $viTrans = $albumCategory->albumCategoryTranslations->where('lang', 'vi')->first();
                                $viTransName = \Arr::get($viTrans, 'name');
                            @endphp
                            <input 
                                id="name_vi" 
                                name="name[vi]" type="text" 
                                class="form-control" 
                                value="{{ old('name[vi]', $viTransName) }}" 
                                placeholder="Tên danh mục Tiếng Việt..."
                                maxlength="127"
                            >
                            {!! $errors->first('name.vi', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                            {!! $errors->first('slug', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2"></label>
                        <label for="name_fr" class="col-form-label col-lg-2">Tiếng Pháp</label>
                        <div class="col-lg-8">
                            @php
                                $frTrans = $albumCategory->albumCategoryTranslations->where('lang', 'fr')->first();
                                $frTransName = \Arr::get($frTrans, 'name');
                            @endphp
                            <input 
                                id="name_fr" 
                                name="name[fr]" 
                                type="text" 
                                class="form-control" 
                                value="{{ old('name[fr]', $frTransName) }}"
                                placeholder="Tên danh mục Tiếng Pháp..."
                                maxlength="127"
                            >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label  class="col-form-label col-lg-2"></label>
                        <label for="name_en" class="col-form-label col-lg-2">Tiếng Anh</label>
                        <div class="col-lg-8">
                            @php
                                $enTrans = $albumCategory->albumCategoryTranslations->where('lang', 'en')->first();
                                $enTransName = \Arr::get($enTrans, 'name');
                            @endphp
                            <input 
                                id="name_en" 
                                name="name[en]" 
                                type="text" 
                                class="form-control" 
                                value="{{ old('name[en]', $enTransName) }}"
                                placeholder="Tên danh mục Tiếng Anh..."
                                maxlength="127"
                            >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2"></label>
                        <label class="col-form-label col-lg-2">Danh mục cha</label>
                        <div class="col-lg-8">
                            <select class="form-control select2" name="parent_id">
                                <option value="">Danh mục gốc</option>
                                {!! $treeHtmlSelected !!}
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">For SEO</h4>
                                <p class="card-title-desc">Fill all information below</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="metatitle">Meta title</label>
                                            <input 
                                                id="metatitle" 
                                                name="meta_title" 
                                                type="text" 
                                                class="form-control" 
                                                maxlength="512"
                                                value="{{ old('meta_tile', \Arr::get($albumCategory, 'meta_title')) }}"
                                            >
                                        </div>
                                        <div class="mb-3">
                                            <label for="metakeywords">Meta Keywords</label>
                                            <input 
                                                id="metakeywords" 
                                                name="meta_keyword" 
                                                type="text" 
                                                class="form-control" 
                                                maxlength="512"
                                                value="{{ old('meta_keyword', \Arr::get($albumCategory, 'meta_keyword')) }}"
                                            >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="metadescription">Meta Description</label>
                                            <textarea 
                                                class="form-control" 
                                                id="metadescription" 
                                                name="meta_description" 
                                                rows="5" 
                                                maxlength="512"
                                            >{{ nl2br_e(old('meta_description', \Arr::get($albumCategory, 'meta_description'))) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-form-label col-lg-2">Tình trạng</label>
                            <div class="col-form-label col-lg-8">
                                <div class="form-check form-switch mb-3" dir="ltr">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        id="SwitchCheckSizesm" 
                                        name="active" 
                                        value="1" 
                                        {{ \Arr::get($albumCategory, 'active') == 1 ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="SwitchCheckSizesm">Hoạt động</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Chỉnh sửa</button>
                            <a href="{{ route('admin.album_category.index') }}" class="btn btn-secondary waves-effect waves-light">Quay lại</a>
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
@endsection