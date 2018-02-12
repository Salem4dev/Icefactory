<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;
class Partner extends Model
{
    protected $table = 'partners';
    protected $primary = 'id';

    public function expenses() {
        return $this->hasMany('\App\Expense','partner_id', 'id');
    }

}
