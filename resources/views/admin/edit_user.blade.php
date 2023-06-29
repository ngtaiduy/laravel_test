@extends('layouts.main')

@section('other-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/edit_user.css') }}">
@endsection

@section('content')
    <div class="container">
        <form action="" method="POST" class="form_style">
            @csrf
            <div class="box_label">
                <p>Tên</p>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="box_label">
                <p>Ngày sinh</p>
                <input type="date" name="dob" id="dob" value="{{ $user->dob }}">
            </div>
            <div class="box_label">
                <p>Giới tính</p>
                <select name="gender" id="gender">
                    <option value="">Chọn giới tính</option>
                    <option value="1" @if ($user->gender == 1) selected @endif>Nam</option>
                    <option value="2" @if ($user->gender == 2) selected @endif>Nữ</option>
                    <option value="0" @if ($user->gender == 0) selected @endif>Khác/Không xác định</option>
                </select>
            </div>
            <div class="box_label">
                <p>Số điện thoại</p>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
                @if (session('msg_phone'))
                    <div class="box_label">
                        <p class="error_msg">{{ session('msg_phone') }}</p>
                    </div>
                @endif
            </div>
            <div class="box_label">
                <p>Email</p>
                <input type="text" name="email" id="email" value="{{ $user->email }}">
                @if (session('msg_email'))
                    <div class="box_label">
                        <p class="error_msg">{{ session('msg_email') }}</p>
                    </div>
                @endif
            </div>
            <div class="box_label">
                <p>Vai trò</p>
                <select name="role_id" id="role_id">
                    <option value="">Chọn vai trò</option>
                    @foreach ($roles as $item)
                        <option @if ($item->id == $user->role_id) selected @endif value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="box_label">
                <p>Trạng thái</p>
                <select name="status" id="status">
                    <option value="">Chọn trạng thái</option>
                    <option value="1" @if ($user->status == 1) selected @endif>Hoạt động</option>
                    <option value="0" @if ($user->status == 0) selected @endif>Không hoạt động</option>
                </select>
            </div>
            <button type="submit" class="button_submit">
                <span>Lưu</span>
            </button>
        </form>
    </div>
@endsection

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function() {});
    </script>
@endpush
