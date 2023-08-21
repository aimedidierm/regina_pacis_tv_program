<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'category_id');
    }
}
