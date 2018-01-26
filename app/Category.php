<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function category() {
        return $this->belongsTo('\App\Category','subcateg_id', 'id');
    }
    public function product() {
        return $this->hasMany('\App\Product','category_id', 'id');
    }
}
