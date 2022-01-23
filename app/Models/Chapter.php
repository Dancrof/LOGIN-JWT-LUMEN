<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'chapter';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url_chapter', 'calalogue_fk'
    ];
}