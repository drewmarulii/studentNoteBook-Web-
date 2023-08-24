<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $fillable=['title', 'due_date'];

    public $sortable = ['id', 'title', 'status', 'due_date', 'created_at', 'updated_at'];

}
