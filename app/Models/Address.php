<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        "uf",
        "city",
        "district",
        "street",
        "zip_code",
        "number",
        "complement",
        "user_id"
    ];
    
    #relacionammento com a tabela users
    public function users(){
        return $this->belongsTo(Users:: class);
    }
}
