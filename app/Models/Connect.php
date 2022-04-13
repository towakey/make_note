<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'serial', 'url', 'token', 'approval'
    ];
    public function getIsApprovalLabelAttribute()
    {
        return config('common.approval_status')[$this->approval];
    }
}
