@extends('layouts.main')

@section('other-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/category_post/list_category_post.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="box_list_category_post">
            <div class="box_header">
                <p>Tên</p>
                <p>Đường dẫn</p>
                <p>Edit</p>
            </div>
            @foreach ($category_post as $item)
                <div class="box_body">
                    <p>{{ $item->name }}</p>
                    <p>{{ $item->slug }}</p>
                    <p>
                        <a href="{{ route('admin.edit-category-post', ['id' => $item->id]) }}">Đổi thổng tin</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function() {});
    </script>
@endpush
