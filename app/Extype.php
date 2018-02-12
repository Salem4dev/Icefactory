<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extype extends Model
{
    public function expenses() {
        return $this->hasMany('\App\Expense','type_id', 'id');
    }
}
