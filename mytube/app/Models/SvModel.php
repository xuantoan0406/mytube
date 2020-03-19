<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SvModel extends Model
{
    use Searchable;
    public $asYouType = true;
    protected $primaryKey = 'id';
    protected $table = 'Sv';
    public function searchableAs()
    {
        return 'sv_index';
    }
}
