<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chantier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'location_id',
        'responsable_id',
        'demande_objact',
        'urgence',
        'travaux_type',
        'categorie',
        'createur'
        
    ];
    
    /**
     * 
     * @return type Many to One relation
     * 
     * between Chantiers and Chantier_adresses table
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }
    
     /**
      * 
      * @return type One to Many relation between responsables&chantiers table.
      */
    public function responsable()
    {
        return $this->belongsTo('App\Models\Responsable');
    }


    /**
     * 
     * @return type On to Many relation
     * 
     * between chantiers table and teunions table
     */
    public function reunions()
    {
        return $this->hasMany('App\Models\Reunion');
    }
    
    /**
     * 
     * @return type Many to Many relation
     * 
     * between Chantiers and Contacts table
     */
    public function contacts() 
    {
    
        return $this->belongsToMany('App\Models\Contact')
                ->withPivot('id')
                ->withPivot('chantier_id')
                ->withPivot('contact_id')
                ->withPivot('activite_de_contact')
                ->withPivot('statut')
                ->withTimestamps();
                
    }
   
}
