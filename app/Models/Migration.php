<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    protected $fillable = [
        'migration_name',
        'commit_id'
    ];
}