<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'reunion_id',
        'type_du_element',
        'commentaire',
        'finalise',
        'a_publie_dans_pv',
        'createur'
    ];

    /**
     * 
     * @return type Many to One relation between Element and Reunion
     */
    public function reunion() 
    {
    
        return $this->belongsTo('App\Models\Reunion');
    }
    
    /**
     * 
     * @return type One to Many relation between Element and ElementPhoto
     */
    public function elementPhotos() 
    {
    
        return $this->hasMany('App\Models\ElementPhoto');
        
    }
    
    /**
     * 
     * @return type One to Many relation between Element and ElementDocument
     */
    public function elementDocument() 
    {
    
        return $this->hasMany('App\Models\ElementDocument');
        
    }
}
