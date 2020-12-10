<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'chantier_id',
        'responsable_id',
        'title', 
        'start',
        'end',
        'allDay',
        'statut',
        'description',
        'photo',
        'color', 
        'textColor',
        'createur'
        ];  
    /**
     * 
     * @return type Many to One relation between reunions and chantiers table 
     */
    public function chantier()
    {
    
        return $this->belongsTo('App\Models\Chantier');
    }
    
    /**
     * 
     * @return type Many to One relation between reunions&responsables table
     */
    public function responsable() 
    {
        return $this->belongsTo('App\Models\Responsable');
    }
    
    /**
     * 
     * @return type Many to Many relation between reunions and chantiers table
     * 
     * with Intermediate table property
     */
    public function contacts() 
    {
    
        return $this->belongsToMany('App\Models\Contact')
                ->withPivot('id')
                ->withPivot('contact_id')
                ->withPivot('reunion_id')
                ->withPivot('activite_de_contact')
                ->withPivot('statut')
                ->withTimestamps();
    }
}
