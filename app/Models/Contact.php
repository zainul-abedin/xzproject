<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
      
        'title',
        'prenom',
        'nom',
        'nom_de_societe',
        'telephone_portable',
        'telephone_domicile',
        'telephone_bureau',
        'autre_telephone',
        'mail_professionnel',
        'mail_personnel',
        'observation'
    ];
    
    /**
     * 
     * @return type Many to Many relation between chantiers and contacts table
     * 
     * With Intermediate table property
     */
    
    public function chantiers() 
    {
        
        return $this->belongsToMany('App\Models\Chantier')
                ->withPivot('id')
                ->withPivot('chantier_id')
                ->withPivot('contact_id')
                ->withPivot('activite_de_contact')
                ->withPivot('statut')
                ->withTimestamps();
    }
    
    /**
     * 
     * @return type Many to Many relation between reunions and contacts table
     * 
     * with Intermediate table property
     */
    public function reunions() 
    {    
        return $this->belongsToMany('App\Models\Reunion')
                ->withPivot('id')
                ->withPivot('contact_id')
                ->withPivot('reunion_id')
                ->withPivot('activite_de_contact')
                ->withPivot('statut')
                ->withTimestamps();
    }
    
    public function responsables() 
    {
        return $this->hasMany('App\Models\Responsable');
    }
}
