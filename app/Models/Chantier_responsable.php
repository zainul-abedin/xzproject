<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chantier_responsable extends Model
{
    use HasFactory;
    
    protected $table = 'chantier_responsable';
    
    protected $fillable = ['chantier_id', 'responsable_id', 'activite_de_responsable', 'statut'];
}
