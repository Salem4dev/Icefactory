<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Employee extends Model
{

    public function getAgeAttribute()
    {
//        return Carbon::parse($this->attributes['birth_day'])->format('Y/m/d');
        return Carbon::parse($this->attributes['birth_day'])->diffInYears();
//        i can access this age in view with $this-> age like this <td>{{ $employee->age }}</td>
//        the ( age ) word the important here to desplay the age by year or day or hours

    }

}
