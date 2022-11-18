<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;
    protected $fillable = ['name' ,'slug'];

    public function posts()
    {
        return $this->belongsToMany(Posts::class);
    }
}
