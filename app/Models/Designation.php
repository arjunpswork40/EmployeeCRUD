<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $table = 'designations';

    protected $fillable = [
        'name',
    ];

    /**
     * static function to get table name for eloquent operations.
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
