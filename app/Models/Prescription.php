<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'prescription_id';


    protected $fillable = [
        'admin_id',
        'partner_id',
        'drugstore_id',
        'bimeh',
        'patient_code',
        'cost',
        'tracking_code',
        'source_img_path',
    ];

    protected $attributes = [
        'status' => 0,
    ];



    public function drug()
    {
        return $this->belongsToMany(Drug::class, 'prescription_drug', 'prescription_id', 'drug_id');
    }
}
