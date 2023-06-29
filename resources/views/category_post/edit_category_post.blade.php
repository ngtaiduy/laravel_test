@extends('layouts.main')

@section('other-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/category_post/edit_category_post.css') }}">
@endsection

@section('content')
    <div class="container">
        <form action="" method="POST" class="form_style">
            @csrf
            <div class="box_label">
                <p>Tên</p>
                <input type="text" name="name" id="name" value="{{ $category_post->name }}">
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
