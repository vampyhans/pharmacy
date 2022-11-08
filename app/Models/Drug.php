<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'drug',
        'quantity',
        'price',
        'total',
        'quotation_id',
    ];

    public function quotations()
    {
      return $this->belongsTo('App\Models\Quotation', 'quotation_id');
    }
}
