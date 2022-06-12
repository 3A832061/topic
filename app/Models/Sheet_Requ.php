<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet_Requ extends Model
{
    use HasFactory;

    protected $fillable = ['mem_name','name','part','page','num_page','quan','remark', 'state', 'day'];

}
