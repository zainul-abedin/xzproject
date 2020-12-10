<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_reunion extends Model
{
    use HasFactory;
    
    protected $table = 'contact_reunion';
    
    protected $fillable = ['contact_id', 'reunion_id', 'activite_de_contact', 'statut'];

}
