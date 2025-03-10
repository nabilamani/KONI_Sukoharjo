<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_cabor', 
        'sport_category', 
        'deskripsi', 
        'puslatcab', 
        'kontak', 
        'level', 
        'logo'
    ];

    // Relasi ke pelatih
    public function coaches()
    {
        return $this->hasMany(Coach::class, 'sport_category', 'id');
    }
    
    // Relasi ke atlet (Athletes)
    public function athletes()
    {
        return $this->hasMany(Athlete::class, 'sport_category', 'id');
    }

    // Relasi ke referee
    public function referees()
    {
        return $this->hasMany(Referee::class, 'sport_category', 'id');
    }

    // Relasi ke referee
    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'sport_category', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'sport_category', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'sport_category', 'id');
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'sport_category', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'sport_category', 'id');
    }



    public function users()
    {
        return $this->hasMany(User::class, 'level', 'level');
    }
}
