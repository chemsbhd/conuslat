<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaRequest extends Model
{
    use HasFactory;

    const STATUS_ENCOURS = 'encours';
    const STATUS_FINALISEE = 'finalisée';
    protected $fillable = [
        'name', 'surname', 'birthdate', 'nationality', 'passport_number',
        'passport_expiry', 'passport_image', 'card_number', 'card_expiry',
        'card_cvc', 'validation','status', 'user_id'
    ];
}
