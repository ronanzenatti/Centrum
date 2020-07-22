<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DataTables;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'matricula', 'biografia', 'foto', 'admin', 'site', 'lattes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unidades()
    {
        return $this->belongsToMany('App\Unidade', 'unidades_users', 'user_id', 'unidade_id')->withPivot(['administrador']);
    }

    public function adminlte_image()
    {
        $user = Auth::user();
        return asset($user->foto);
    }

    public function adminlte_profile_url()
    {
        $id = Auth::id();
        return `/docentes/{$id}/edit`;
    }

    public function adminlte_desc()
    {
        $user = Auth::user();
        return $user->email;
    }
}
