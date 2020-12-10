<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chantier_adresse extends Model
{
    use HasFactory;
    
    protected $fillable = ['adresse', 'adresse_supplementaire'];
    
    /**
     * 
     * @return type Many to On relation
     * 
     * One chantier_adresse has Many chantiers
     */
    public function locations() 
    {
    
        return $this->hasMany('App\Models\Location');
    }
}
