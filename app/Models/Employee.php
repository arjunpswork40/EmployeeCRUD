<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'photo',
        'designation_id',
        'password'
    ];

    /**
     * static function to get table name for eloquent operations.
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
