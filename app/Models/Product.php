<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use SoftDeletes;

    public $attrs = ['id', 'name', 'image', 'company_name', 'category_name', 'status_name', 'unit_name'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'description_ar', 'description_en', 'image', 'status_id', 'slug');

}
