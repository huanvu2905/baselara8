@extends('admin::layouts.main')

@section('title', __('Quản lý bài viết'))

@section('head-css')
<!-- Sweet Alert-->
<link href="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')   
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Quản lý bài viết</h4>

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
    <div class="card border border-primary">
        <div class="card-body">
            <a href="{{ route('admin.post.create') }}" class="btn btn-primary waves-effect waves-light mb-4">
                <i class="bx bxs-plus-circle font-size-16 align-middle me-2"></i> Thêm mới
            </a>
            <div class="table-responsive">
                <table class="table mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Lượt xem</th>
                            <th>Cập nhật</th>
                            <th>Tình trạng</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="align-middle {{ $loop->iteration % 2 == 0 ? 'table-primary' : '' }}" id="{{ \Arr::get($post, 'id') }}">
                            <td>{{ $post->id }}</td>
                            @php
                                $category = \Arr::get($post, 'category');
                            @endphp
                            <td><a href="javascript:;">{{ \Arr::get($post, 'name') }}</a></td>
                            <td>{{ \Arr::get($category, 'name') }}</td>
                            <td>{{ \Arr::get($post, 'views') }}</td>
                            <td>{{ \Arr::get($post, 'updated_at') }}</td>
                            <td>{{ ($post->active==1) ? 'Active' : 'Deactive' }}</td>
                            <td class="text-center">
                                <div>
                                    <div class="btn-group btn-group-example" role="group">
                                        <a 
                                            type="button" 
                                            class="btn btn-primary w-xs"
                                            href="{{ route('admin.post.edit', $post->id) }}"
                                        >
                                            <i class="mdi mdi-pencil d-block font-size-9"></i>
                                        </a>
                                        <button
                                            id="delete" 
                                            type="button" 
                                            class="btn btn-danger w-xs" 
                                            data-url="{{ route('admin.post.destroy', $post->id) }}"
                                        >
                                            <i class="mdi mdi-trash-can d-block font-size-9"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('page-js')
<!-- Sweet Alerts js -->
<script src="{{ asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
            $(document).on('click', '#delete', function(e){
                var url = $(this).data('url');
                SwalDelete(url);
                e.preventDefault();
            });
        });
        function SwalDelete(url){

            swal.queue([
                {
                    title:'Bạn có chắc chắn?',
                    text: "Dữ liệu này sẽ bị xóa ngay lập tức!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đúng, Xóa nó!',
                    cancelButtonText: 'Bỏ qua',
                    showLoaderOnConfirm: true,
                    preConfirm: function (e) {
                        return new Promise(function (e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: url,
                                type : "POST",
                                dataType : "JSON",
                            })
                            .done(function(response){
                                console.log(response)
                                Swal.fire("Đã xóa!", response.message, response.status);
                                location.reload(); // then reload the page.
                            })
                            .fail(function(){
                                Swal.fire('Oops...', 'Có lỗi xảy ra !', 'error');
                            });
                        });
                    },
                },
            ]).catch(swal.noop);

        }



</script>
@endsection