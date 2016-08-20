<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaEducativo extends Model
{

    use UuidForKey;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'programas_educativos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    	'created_at', 'updated_at'
    ];

}
