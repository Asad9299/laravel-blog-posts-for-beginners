<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'content', 'user_id', 'image', 'category_id'];

    public function list() {
        return $this->where('user_id', auth()->user()->id)->latest()->paginate(1);
    }

    public function add($post) {
       return $this->create($post);
    }

    public function edit($post) {
        return $this->update($post);
     }

    public function remove() {
        return $this->delete();
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(

            get: function ($image) {
                if ($image) {
                    return asset('storage/posts/' .$image);
                } 
            }
        );
    }
}
