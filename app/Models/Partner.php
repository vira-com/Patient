<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    use HasFactory;

    protected $table = 'partners';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'partner_id';


    protected $fillable = [
        'partner_id',
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
