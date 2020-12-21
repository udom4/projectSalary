<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class emergency_call extends Model {
    protected $table = 'emergency_call';
    protected $fillable = ['id', 'emp_id','e_name','e_surname','e_nickname','relation_id'];

}