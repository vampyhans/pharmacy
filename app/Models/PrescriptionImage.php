<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionImage extends Model
{
    use HasFactory;

    protected $table = 'prescriptionimages';

    protected $fillable = [
        'url', 
        'prescription_id',
    ];

    public function prescription()
{
  return $this->belongsTo('App\Models\Prescription', 'prescription_id');
}

}
