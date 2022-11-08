<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'address',
        'date',
        'time',
        'user_id',
    ];

    public function images()
    {
     return $this->hasMany('App\Models\PrescriptionImage', 'prescription_id');
    }

    public function quotations()
    {
     return $this->hasMany('App\Models\Quotation', 'prescription_id');
    }

    public function users()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
