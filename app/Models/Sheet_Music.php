<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet_Music extends Model
{
    use HasFactory;

    protected $fillable = ['type','name','zhname','composer','arranger','lost','saveform','authorize',
        'year','price','change','check','remark','pin'];
}
