<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'chantier_adresse_id',
        'batiment',
        'escalier',
        'etage',
        'porte',
        'interphone',
        'digicode',
        'prm',
        'superficie',
        'appartement_type',
        'description',
        'createur'
        
    ];
    
    /**
     * 
     * @return type Many to One relation between locations&chantier_adresses table
     */
    public function chantier_adresse()
    {
        return $this->belongsTo('App\Models\Chantier_adresse');
    }
    
    /**
     * 
     * @return type One to Many relation between locations&chantiers table
     */
    public function chantiers()
    {
        return $this->hasMany('App\Models\Chantier');
    }
}
