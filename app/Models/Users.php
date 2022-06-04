<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "password",
        "date_nasc",
        "sex"
    ];
    
    #relacionammento com a tabela address
    public function address(){
        return $this->hasMany(Address:: class);
    }

    #quando excluir usuário apagar tabem o endereço relacionado ao user
    protected static function boot(){
        parent::boot();
        static::deleted((function($users){
            $users->address()->delete();
        }));
    }
}
