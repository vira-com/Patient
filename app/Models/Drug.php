<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $table = 'drugs';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'drug_id';

    public function prescription()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_drug', 'prescription_id', 'drug_id');
    }

    public function drugStore()
    {
        return $this->belongsToMany(DrugStore::class, 'drugstore_drug', 'drugStore_id', 'drug_id');
    }

}
