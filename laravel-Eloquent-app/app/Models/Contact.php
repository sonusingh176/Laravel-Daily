<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contact';

    protected $fillable = [
        'email', 
        'phone',
        'address',
        'city',
        'user_id'
    ];


    //belongTo makes Inrevese relationship with table. 
    //foreign key wale table to primary table se link krna ho tab belongsTo ka use krnte hai. ye ulta relation bana rahe hai.
    public function user(){
        return $this->belongsTo(User::class);
    }
}
