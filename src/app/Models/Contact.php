<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

    protected $fillable = ['category_id', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}