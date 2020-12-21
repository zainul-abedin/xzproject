<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'contact_id',
        'statut'
    ];
    
    /**
     * 
     * @return type Many to One relation between responsables&contacts table
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }
    
    /**
     * 
     * @return type One to Many relation between responsables&chantiers table
     */
    public function chantiers() 
    {
        
        return $this->belongsToMany('App\Models\Chantier')
                ->withPivot('id')
                ->withPivot('chantier_id')
                ->withPivot('responsable_id')
                ->withPivot('activite_de_responsable')
                ->withPivot('statut')
                ->withTimestamps();
    }
    
    /**
     * 
     * @return type One to Many relation between responsables&reunions table
     */
    public function reunions()
    {
        return $this->hasMany('App\Models\Reunion');
    }
    
    
}
