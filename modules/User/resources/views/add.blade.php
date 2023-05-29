@extends('layouts.backend')
@section('content')
    <form action="{{ route('admin.users.store') }}" method="POST" class="mb-4">
        <div class="row w-50">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="Name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Group</label>
                    <select name="group_id" id=""
                        class="form-control {{ $errors->has('group_id') ? 'is-invalid' : '' }}"
                        value="{{ old('group_id') }}">
                        <option value="0">Select Group</option>
                        <option value="1">1</option>
                    </select>
                    @error('group_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="Email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Cancel</a>
        @csrf
    </form>
@endsection
