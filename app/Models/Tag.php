<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function list() {
        return $this->latest()->paginate(1);
    }

    public function add($tag) {
        return $this->create($tag);
    }

    public function edit($tag) {
        return $this->update($tag);
    }

    public function remove() {
        return $this->delete();
    }

    public function post()  {
        return $this->belongsToMany(Post::class);
    }
}
