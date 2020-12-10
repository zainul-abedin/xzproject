<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chantier_contact extends Model
{
    use HasFactory;
    
    protected $table = 'chantier_contact';
    
    protected $fillable = ['chantier_id', 'contact_id', 'activite_de_contact', 'statut'];
   
}
