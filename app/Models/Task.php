<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','deadline_date','deadline_time','priority','category_id','description','assignee','created_at','updated_at'];


public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $casts = [
        'category_id' => 'array',
    ];
}
