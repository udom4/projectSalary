<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model {

    protected $fillable = ['pos_id','pos_name','team_id','salary_rate'];

}