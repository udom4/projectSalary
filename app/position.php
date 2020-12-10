<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model {

    protected $fillable = ['id','pos_name','team_id','salary_rate'];

}