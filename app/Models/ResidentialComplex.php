<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialComplex extends Model
{
    use HasFactory;
    public function features_residential_complexes() {
        return $this->hasMany('App\Models\FeaturesResidentialComplex', 'residential_complex_id');
    }
    public function features_appartments() {
        return $this->hasMany('App\Models\FeaturesAppartment', 'residential_complex_id');
    }
    public function gallery_residential_complex() {
        return $this->hasMany('App\Models\GalleryResidentialComplex', 'residential_complex_id');
    }
    public function construction_progress() {
        return $this->hasMany('App\Models\ConstructionProgress', 'residential_complex_id');
    }
    public function residential_complex_houses() {
        return $this->hasMany('App\Models\ResidentialComplexHouse', 'residential_complex_id');
    }
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'residential_complex_id');
    }
    public function advantages() {
        return $this->hasMany('App\Models\Advantage', 'residential_complex_id');
    }
    public function map_marker() {
        return $this->belongsTo('App\Models\MapMarker', 'marker_id');
    }
}
