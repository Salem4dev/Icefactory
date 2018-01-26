<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Customer;
use Carbon\Carbon;
use DateTime;
class Sale extends Model
{
    protected $table = 'sales';
    protected $primary = 'id';

    public function customer() {
        return $this->belongsTo('\App\Customer','customer_id', 'id');
    }
   /* public function dateday() {
        return DateTime::createFromFormat('YmdHi', $this->created_at);
//        $timestemp = $this->created_at ;
//        return Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->day;
//        return dd($datetime);
//        return $datetime->format('D');

    }*/
}
