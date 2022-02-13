@extends('admin::layouts.main')

@section('title', __('Chỉnh sửa about'))

@section('head-css')
    <!-- select2 css -->
    <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')   
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Chỉnh sửa Featured Post</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.top.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">About</li>
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
                <form method="POST" action="{{ route('admin.setting.top.featured.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if( ! $featured)
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">BIG</label>
                        <div class="col-lg-8">
                            <select class="form-select col-3" name="big">
                                <option value="">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('big', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('big', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">TOP</label>
                        <div class="col-lg-8">
                            <select class="form-select col-3" name="top">
                                <option value="">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('top', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('top', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">BOTTOM</label>
                        <div class="col-lg-8">
                            <select class="form-select col-3" name="bottom">
                                <option value="">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('bottom', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('bottom', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    @else 
                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">BIG</label>
                        <div class="col-lg-8">
                            <select class="form-select col-3" name="big">
                                <option value="">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('big', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('big', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">TOP</label>
                        <div class="col-lg-8">
                            <select class="form-select col-3" name="top">
                                <option value="">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('top', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('top', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">BOTTOM</label>
                        <div class="col-lg-8">
                            <select class="form-select col-3" name="bottom">
                                <option value="">Danh mục gốc</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('bottom', $category->id) }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('bottom', '<div class="text-danger font-weight-light mt-1">:message</div>') !!}
                        </div>
                    </div>

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