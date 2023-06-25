@extends('layouts.backend')
@section('content')
    <form action="" method="post">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Tên</label>
                    <input type="text" name="name" onchange="ChangeToSlug()" id="category-name-input"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Tên..."
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">slug</label>
                    <input type="text" name="slug" id="category-slug"
                        class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" placeholder="slug..."
                        value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Teacher</label>
                    <select name="teacher_id" id=""
                        class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}">
                        <option value="0">Select Teacher</option>
                        <option value="1">Administrator</option>
                    </select>
                    @error('teacher_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Code</label>
                    <input type="code" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                        placeholder="Code..." id="">
                    @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">price</label>
                    <input type="price" name="price"
                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="price..."
                        id="">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Sale Price</label>
                    <input type="sale_price" name="sale_price"
                        class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}"
                        placeholder="sale price..." id="">
                    @error('sale_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="">Document</label>
                    <select name="is_document" id=""
                        class="form-control {{ $errors->has('is_document') ? 'is-invalid' : '' }}">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    @error('is_document')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="">Status</label>
                    <select name="status" id=""
                        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <option value="0">Unpublic</option>
                        <option value="1">Public</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="">Support</label>
                    <input type="support" name="support"
                        class="form-control {{ $errors->has('support') ? 'is-invalid' : '' }}"
                        placeholder="support..." id="">
                    @error('support')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="">Detail</label>
                    <textarea type="detail" name="detail" class="form-control ckeditor {{ $errors->has('detail') ? 'is-invalid' : '' }}"
                        placeholder="detail..." id=""></textarea>
                    @error('detail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="col-12">
                <div class="mb-3">
                    <div class="row align-items-end">
                        <div class="col-7">
                            <label for="">Thumbnail</label>
                            <input type="thumbnail" name="thumbnail"
                                class="form-control {{ $errors->has('support') ? 'is-invalid' : '' }}"
                                placeholder="thumbnail..." id="thumbnail">
                            @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-2 d-grid">
                            <button class="btn btn-primary" id="lfm">
                                <i class="fa fa-upload"></i> Upload
                            </button>
                        </div>
                        <div class="col-3">
                            <div id="holder">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Lưu lại</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Hủy</a>
            </div>
        </div>
        @csrf
    </form>
@endsection
