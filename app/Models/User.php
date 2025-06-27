<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',  // Ajout du nom
        'prenom',  // Ajout du prénom
        'email',
        'password',
        'nationalite',  // Ajout de la nationalité
        'numero_passeport',  // Ajout du numéro de passeport
        'date_validite',  // Ajout de la date de validité
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_validite' => 'date',  // Cast de la date de validité en type date
        ];
    }
    // Dans le modèle User.php

    public function visaRequest()
    {
        return $this->hasOne(VisaRequest::class);
    }

    public function run()
    {
        User::factory()->count(100)->create();
    }
}
