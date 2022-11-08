<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
      'amount',
      'status',
      'prescription_id',
      'user_id',
  ];

    public function prescription()
    {
      return $this->belongsTo('App\Models\Prescription', 'prescription_id');
    }

    public function drugs()
    {
     return $this->hasMany('App\Models\Drug', 'quotation_id');
    }
}
