<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsTranslation extends Model
{
     // Disable timestamps if you're not using them for translations
     public $timestamps = false;

     // Define the fillable fields for mass-assignment
     protected $fillable = [
         'service_id', 'locale', 'name','description','image','body'
     ];

    }