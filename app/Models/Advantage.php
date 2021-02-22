<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;
    public function advantages_icons() {
        return $this->belongsTo('App\Models\AdvantagesIcon', 'icon_id');
    }
}
