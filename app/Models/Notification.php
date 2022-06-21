<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'data',
        'read_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function getColorAttribute()
    {
        switch ($this->type) {
            case 'info':
                return 'bg-green';
            case 'warning':
                return 'bg-warning';
            case 'general':
                return 'bg-blue';
            default:
                return 'bg-dark';
        }
    }
}
