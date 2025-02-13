<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodoItem extends Model
{
    use HasFactory;

    protected $fillable = ['checklist_id', 'task', 'completed'];
    
    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}
