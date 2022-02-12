<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostels extends Model
{
    use HasFactory;

    protected $table = 'hostels';
    protected $fillable = ['hostelName','about','district','userId','primaryImg','additionalImages'];

}
