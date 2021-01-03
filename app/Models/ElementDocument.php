<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementDocument extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'element_id',
        'document_type',
        'description',
        'document',
        'createur'
    ];
    
    /**
     * 
     * @return type Many to One relation between ElementDocument and Element
     */
    public function element() 
    {
    
        return $this->belongsTo('App\Models\Element');
        
    }
}
