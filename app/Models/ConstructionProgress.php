<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionProgress extends Model
{
    use HasFactory;
    public function construction_progress_gallery() {
        return $this->hasMany('App\Models\ConstructionProgressGallery', 'construction_progress_id');
    }
}
