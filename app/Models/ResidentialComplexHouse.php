<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialComplexHouse extends Model
{
    use HasFactory;
    public function residential_complex_house_descriptions() {
        return $this->hasMany('App\Models\ResidentialComplexHouseDescription', 'residential_complex_house_id');
    }
}
