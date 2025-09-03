<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_url',
        'status',
        'views',

    ];

    protected $casts = [
        'title' => 'array',

    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getTitleAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = json_encode($value);
    }




}
