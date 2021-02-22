<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public function advantages() {
        return $this->hasMany('App\Models\Advantage', 'page_id');
    }
}
