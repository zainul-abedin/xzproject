<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementPhoto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'element_id',
        'photo_type',
        'description',
        'photo',
        'createur'
    ];
    
    /**
     * 
     * @return type Many to One relation between ElementPhoto and Element
     */
    public function element()
    {
    
        return $this->belongsTo('App\Models\Element');
        
    }
}
