<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;
    protected $fillable=['name', 'description'];

    public $sortable = ['id', 'name', 'description', 'created_at', 'updated_at'];

}
