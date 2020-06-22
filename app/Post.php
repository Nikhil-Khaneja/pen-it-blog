<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $dates =[
        'published_at'
    ];
    protected $fillable = [
        'title',
        'user_id',
        'excerpt',
        'content',
        'image',
        'category_id',
        'published_at'
    ];
    use SoftDeletes;    
// RELATIONSHIP FUNCTIONS
    public function category(){
        return $this->belongsTo(Category::class);
    }

    
    public function tags(){
        return  $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // HELPER FUNCTION
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

}
