<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model {
    protected $table = 'department';
    protected $fillable = ['id','dept_name'];

}