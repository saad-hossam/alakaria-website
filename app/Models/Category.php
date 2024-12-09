<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use Translatable ;

    use HasFactory;
    public $translatedAttributes=['name'];
    protected $fillable = [
        'name','department_id'
    ];
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
