<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescription';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'prescription_id';

    public function drug()
    {
        return $this->belongsToMany(Drug::class, 'prescription_drug', 'prescription_id', 'drug_id');
    }
}
