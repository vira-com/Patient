<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    protected $primaryKey = 'drug_stores_id';

    public function drug()
    {
        return $this->belongsToMany(Drug::class, 'drugstore_drug', 'drugStore_id', 'drug_id');
    }
}
