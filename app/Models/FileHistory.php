<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileHistory extends Model
{
    //

    protected $fillable = [
        'file_id',
        'action', // e.g., 'created', 'updated', 'deleted'
        'user_id', // User who performed the action
        'type',
        'path', // Path of the file if applicable
        'qr_code' // QR code of the file if applicable
    ];
}