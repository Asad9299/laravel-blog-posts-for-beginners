<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function add($category) {
        return self::create($category);
    }

    public function list($doPaginate) {
        if($doPaginate) {
            return self::latest()->paginate(1);
        } else {
            return self::latest()->get();
        }
    }

    public function edit($category) {
        return $this->update($category);
    }

    public function remove() {
        return $this->delete();
    }
}
