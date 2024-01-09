<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug',
        'extract',
        'body',
        'status',
        'user_id',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
         
    }

    public function category(){      
        return $this->belongsTo(Categorie::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    

}
