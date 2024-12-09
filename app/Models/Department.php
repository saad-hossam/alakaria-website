<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Department extends Model
{
    use Translatable ;
    use HasFactory;
    // use TranslatableContract;
    public $translatedAttributes=['name'];
    protected $fillable = [
        'name',
    ];

    // protected static function boot()
    // {
    //     static::deleting(function ($department) {
    //         $department->translations()->delete();
    //     });
    // }
    public function translations()
    {
        return $this->hasMany(DepartmentTranslation::class);
    }

    // Department.php
public function categories()
{
    return $this->hasMany(Category::class);
}
public function products()
    {
        return $this->hasMany(Product::class);
    }


}
