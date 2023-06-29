@extends('layouts.main')

@section('other-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/user/login_form.css') }}">
@endsection

@section('content')
    <div class="container">
        <form action="" method="POST" class="form_style">
            @csrf
            @if (session('msg'))
                <div class="box_label">
                    <p class="error_msg">{{ session('msg') }}</p>
                </div>
            @endif
            <div class="box_label">
                <p>Email</p>
                <input type="text" name="email" id="email" placeholder="Nhập Email" autocomplete="off">
            </div>
            <div class="box_label">
                <p>Mật khẩu</p>
                <div class="box_input_password">
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" autocomplete="off">
                    <i></i>
                </div>
            </div>
            <button type="submit" class="button_submit">
                <span>Đăng nhập</span>
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
