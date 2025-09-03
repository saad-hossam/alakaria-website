@extends('layouts.dashbord.master')

@section('title')
    إضافة فيديو جديد
@endsection

@section('content')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">إضافة فيديو جديد</h4>
        </div>
        <div class="page-rightheader ml-auto d-lg-flex d-none my-3">
        @can('video-list')

            <div class="btn-list">
                <a href="{{ route('videos.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> العودة إلى الفيديوهات
                </a>
            </div>
            @endcan

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">معلومات الفيديو</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en">العنوان (بالإنجليزية) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" 
                                           id="title_en" name="title_en" value="{{ old('title_en') }}" required>
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ar">العنوان (بالعربية) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_ar') is-invalid @enderror" 
                                           id="title_ar" name="title_ar" value="{{ old('title_ar') }}" required>
                                    @error('title_ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video_url">رابط الفيديو <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                           id="video_url" name="video_url" value="{{ old('video_url') }}" 
                                           placeholder="https://www.youtube.com/watch?v=..." required>
                                    <small class="form-text text-muted">مدعوم: يوتيوب، فيميو، ومنصات فيديو أخرى</small>
                                    @error('video_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">الحالة <span class="text-danger">*</span></label>
                                    <select class="form-control @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="active">نشط</option>
                                        <option value="disabled">معطل</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> إنشاء الفيديو
                            </button>
                            <a href="{{ route('videos.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 
