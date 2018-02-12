<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Customer;
use Carbon\Carbon;
use DateTime;
class Expense extends Model
{
    protected $table = 'expenses';
    protected $primary = 'id';

    public function partner() {
        return $this->belongsTo('\App\Partner','partner_id', 'id');
    }
    public function employee() {
        return $this->belongsTo('\App\Employee','empl_id', 'id');
    }
    public function type() {
        return $this->belongsTo('\App\Extype','type_id', 'id');
    }

}
