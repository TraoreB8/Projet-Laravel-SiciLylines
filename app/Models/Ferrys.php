<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ferrys extends Model
{
    protected $fillable = ["nom","photo","longueur","largeur","vitesse"];
    use HasFactory;

    public function equipements():BelongsToMany{
        return $this->belongsToMany(Equipement::class);
    }
}
