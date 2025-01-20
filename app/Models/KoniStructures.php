<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KoniStructures extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'photo',
        'period',
        'description'
    ];
}
