<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'admin_id';


    protected $fillable = [
        'admin_id',
        'Name',
        'phone',
        'email',
        'password',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $hidden = [
        'password',
    ];
}
