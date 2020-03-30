<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Video extends Model
{
    use Searchable;
    protected $primaryKey = 'id';
    protected $table = 'Videos';

    protected $fillable = [
        'nameUser', 'nameVideo'
    ];
    public function searchableAs()
    {
        return "Videos_index";
    }
}
