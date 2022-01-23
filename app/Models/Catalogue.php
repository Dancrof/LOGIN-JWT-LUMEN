<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string
     */
    protected $table = 'catalogue';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url_portada', 'name', 'Description', 'gender_fk'
    ];
}
