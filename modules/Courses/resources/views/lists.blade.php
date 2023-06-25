@extends('layouts.backend')
@section('content')
<p><a href="{{route('admin.courses.create')}}" class="btn btn-primary">Thêm mới</a></p>
@if (session('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif
<table id="datatable" class="table table-bordered">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Price</th>
            <th>Status</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Tên</th>
            <th>Price</th>
            <th>Status</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </tfoot>
    
</table>
@endsection
@include('parts.backend.delete')
@section('scripts')
<script>
    $(document).ready(function () {
    $("#datatable").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: "{{route('admin.courses.data')}}",
        columns: [
            {
                data: 'name',
            },
            {
                data: 'price',
            },
            {
                data: 'status',
            },
            {
                data: 'created_at',
            },
            {
                data: 'edit',
            },
            {
                data: 'delete',
            }
        ]
    });
});
</script>
@endsection