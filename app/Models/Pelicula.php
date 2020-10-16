<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Pelicula extends Model
{
    //
     protected $fillable = ['nombre','resumen','director','duracion','genero'];
}