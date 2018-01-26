<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Sale;
class Customer extends Model
{

    protected $table = 'customers';
    protected $primary = 'id';

    public function sales () {
        return $this->hasMany('\App\Sale', 'customer_id', 'id');
    }
   /*  public function hasAttended($month) {
        return Attnedance::where('emp_id', '=', $this->id)
            ->where('created_at', '!=', NULL)
            ->where('updated_at', '!=', NULL)
            ->where('DATE(month)', '=', $month)
            ->get()
            ->count();
    } */

}