@extends('layouts.backend')
@section('content')
@if (session('msg'))
<div class="alert alert-success">{{session('msg')}}</div>
@endif
<form action="{{ route('admin.users.postEdit', ["id" => $user->id])}}" method="post">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="">Tên</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Tên..." value="{{old('name') ?? $user->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
               
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="Email..." value="{{old('email') ?? $user->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Nhóm</label>
                <select name="group_id" id="" class="form-control {{$errors->has('group_id')?'is-invalid':''}}" >
                    <option value="0" selected="{{(old('group_id') ?? $user->group_id) == "0"}}">Chọn Nhóm</option>
                    <option value="1" selected="{{(old('group_id') ?? $user->group_id) == "1"}}">Administrator</option>
                </select>
                @error('group_id')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Mật khẩu..." id="">
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                 </div>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Lưu lại</button>
            <a href="{{route('admin.users.index')}}" class="btn btn-danger">Hủy</a>
        </div>
    </div>
    @csrf
</form>
@endsection