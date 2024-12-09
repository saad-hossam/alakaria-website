<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use Translatable ;
    use HasFactory;
    public $translatedAttributes=['name','description'];
    protected $fillable =[
        'name',
        'description',
        'icon',
       'status',
    ];

    // protected static function boot()
    // {
    //     static::deleting(function ($department) {
    //         $department->translations()->delete();
    //     });
    // }
    public function translations()
{
    return $this->hasMany(ServiceTranslation::class);
}



}
