<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DrugStore extends Authenticatable
{
    use HasFactory;

    protected $table = 'drug_stores';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'drugstore_id';


    protected $fillable = [
        'drugstore_id',
        'name',
        'phone',
        'email',
        'password',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $hidden = [
        'password',
    ];

    // public function drug()
    // {
    //     return $this->belongsToMany(Drug::class, 'drugstore_drug', 'drugStore_id', 'drug_id');
    // }
}
