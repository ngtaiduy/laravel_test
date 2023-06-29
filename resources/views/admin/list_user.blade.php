@extends('layouts.main')

@section('other-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin/list_user.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="box_list_user">
            <div class="box_header">
                <p>Tên</p>
                <p>Ngày sinh</p>
                <p>Giới tính</p>
                <p>Số điện thoại</p>
                <p>Email</p>
                <p>Vai trò</p>
                <p>Trạng thái</p>
                <p>Edit</p>
            </div>
            @foreach ($users as $item)
                <div class="box_body">
                    <p>{{ $item->name }}</p>
                    <p>{{ $item->dob }}</p>
                    @if ($item->gender == 1)
                        <p>Nam</p>
                    @elseif ($item->gender == 2)
                        <p>Nữ</p>
                    @else
                        <p>Khác</p>
                    @endif
                    <p>{{ $item->phone }}</p>
                    <p>{{ $item->email }}</p>
                    <p>{{ $item->role->name }}</p>
                    <p>{{ $item->status == 1 ? 'Đang hoạt động' : 'Không hoạt động' }}</p>
                    <p>
                        <a href="{{ route('admin.edit-user', ['id' => $item->id]) }}">Đổi thổng tin</a>
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
