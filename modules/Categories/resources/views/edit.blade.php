@extends('layouts.backend')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <form action="{{ route('admin.categories.postEdit', ['id' => $category->id]) }}" method="post">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Tên</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="Tên..." value="{{ old('name') ?? $category->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                        placeholder="Slug..." value="{{ old('slug') ?? $category->slug }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Parent Category</label>
                    <select name="parent_id" id=""
                        class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}">
                        <option value="0" selected="{{ (old('parent_id') ?? $category->parent_id) == '0' }}">Chọn Nhóm
                        </option>
                        {{ getCategories($categories, old('parent_id')) }}
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Lưu lại</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">Hủy</a>
            </div>
        </div>
        @csrf
    </form>
@endsection
