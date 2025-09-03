@extends('layouts.dashbord.master')

@section('title')
عرض الفيديوهات
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0 mt-3">عرض الفيديوهات</h4>
        </div>
        <div class=" ml-auto d-lg-flex d-none">
        {{-- @can('video-create') --}}

            <div class="btn-list my-3">
                <a href="{{ route('videos.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> إضافة فيديو جديد
                </a>
            </div>
            {{-- @endcan --}}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h3 class="card-title">جميع الفيديوهات</h3> -->
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover text-md-nowrap" id="example1" data-page-length='50' style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>العنوان</th>
                                    <th>عدد المشاهدات</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <strong>{{ $video->title['ar'] ?? 'غير متوفر' }}</strong><br>
                                            <small class="text-muted">{{ $video->title['en'] ?? 'N/A' }}</small>
                                        </td>

                                        <td>{{ $video->views }}</td>
                                        <td>
                                            @if($video->status == 'active')
                                                <span class="badge badge-success">نشط</span>
                                            @else
                                                <span class="badge badge-danger">معطل</span>
                                            @endif
                                        </td>
                                        <td>
                                        @can('video-edit')

                                            <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-sm btn-info me-3">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endcan

                                            @can('video-delete')

                                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display: inline; ms-5">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الفيديو؟')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            @endcan

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">لا توجد فيديوهات.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
