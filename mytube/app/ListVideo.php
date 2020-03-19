<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ListVideo extends Model
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
