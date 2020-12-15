<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class type_employee extends Model {
    protected $table = 'type_employee';
    protected $fillable = ['id','type_name'];

}