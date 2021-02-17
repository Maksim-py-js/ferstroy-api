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
    public function construction_progress_gallery() {
        return $this->hasMany('App\Models\ConstructionProgressGallery', 'construction_progress_id');
    }
}
