<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class team extends Model {
    protected $table = 'team';
    protected $fillable = ['id','team_name','dept_id'];

}