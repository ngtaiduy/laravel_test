@extends('layouts.main')

@section('other-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/user/change_password.css') }}">
@endsection

@section('content')
    <div class="container">
        <form action="" method="POST" class="form_style">
            @csrf
            @if (session('msg_success'))
                <div class="box_label">
                    <p class="error_msg">{{ session('msg_success') }}</p>
                </div>
            @endif
            <div class="box_label">
                <p>Mật khẩu hiện tại</p>
                <div class="box_input_password">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu hiện tại"
                        autocomplete="off">
                    <i></i>
                </div>
                @if (session('msg_password'))
                    <div class="box_label">
                        <p class="error_msg">{{ session('msg_password') }}</p>
                    </div>
                @endif
            </div>
            <div class="box_label">
                <p>Mật khẩu mới</p>
                <div class="box_input_password">
                    <input type="password" name="re_password" id="re_password" placeholder="Nhập mật khẩu mới"
                        autocomplete="off">
                    <i></i>
                </div>
            </div>
            <div class="box_label">
                <p>Nhập lại mật khẩu</p>
                <div class="box_input_password">
                    <input type="password" name="re_password_2" id="re_password_2" placeholder="Nhập lại mật khẩu mới"
                        autocomplete="off">
                    <i></i>
                </div>
                @if (session('msg_re_password_2'))
                    <div class="box_label">
                        <p class="error_msg">{{ session('msg_re_password_2') }}</p>
                    </div>
                @endif
            </div>
            <button type="submit" class="button_submit">
                <span>Đổi mật khẩu</span>
            </button>
        </form>
    </div>
@endsection

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.box_input_password i').click(function() {
                var type_input = $(this).siblings('input').attr('type');
                if (type_input == 'password') {
                    $(this).siblings('input').attr('type', 'text');
                } else if (type_input == 'text') {
                    $(this).siblings('input').attr('type', 'password');
                }
            });
        });
    </script>
@endpush
