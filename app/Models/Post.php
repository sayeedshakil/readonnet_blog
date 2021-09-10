<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $fillable = ['unique_post_id','title','image','post','category_id','user_id','is_active','slug'];

    public static function boot(){
        parent::boot();

        static::creating(function($post){
            $post->unique_post_id = 'post'.'-'.str_pad($post->withTrashed()->max('id')+1, 6,'220000', STR_PAD_LEFT);

        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
