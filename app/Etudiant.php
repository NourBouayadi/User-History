<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];

    protected  $fillable =['nom', 'prenom', 'dtn', 'lieun'];
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
    ];

    public function activityLog()
    {
        return $this->hasOne('App\ActivityLog', 'subject_id', 'id');
    }



}
