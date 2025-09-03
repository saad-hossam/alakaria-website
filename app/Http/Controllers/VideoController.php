<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // دالة استخراج ID الفيديو من رابط يوتيوب
    private function extractYoutubeId(string $url): ?string
    {
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:.*v=|embed/)|youtu\.be/)([^&?/]{11})%i';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    // حفظ فيديو جديد
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'video_url' => 'required|url',
            'status' => 'required|in:active,disabled',

        ]);

        $video = new Video();
        $video->title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];
        $video->video_url = $request->video_url;
        $video->status = $request->status;


        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }


    // تحديث فيديو موجود
    public function update(Request $request, Video $video)
{
    $request->validate([
        'title_en' => 'required|string|max:255',
        'title_ar' => 'required|string|max:255',
        'video_url' => 'required|url',
        'status' => 'required|in:active,disabled',

    ]);

    $video->title = [
        'en' => $request->title_en,
        'ar' => $request->title_ar,
    ];

    $video->video_url = $request->video_url;
    $video->status = $request->status;



    $video->save();

    return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
}




    // صفحة عرض جميع الفيديوهات (اختياري)
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.videos.index', compact('videos'));
    }

    // صفحة تعديل فيديو
    public function edit(Video $video)
    {
        return view('dashboard.videos.edit', compact('video'));
    }

    // صفحة إضافة فيديو
    public function create()
    {
        return view('dashboard.videos.create');
    }
    public function destroy(Video $video)
{
    try {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    } catch (\Exception $e) {
        // في حالة حدوث خطأ ما
        return redirect()->route('videos.index')->with('error', 'Failed to delete the video.');
    }
}

}
