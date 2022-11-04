<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime:m/d/Y',
        'updated_at' => 'datetime:m/d/Y'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\category', 'category_id', 'id');
    }
}
