<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class relation extends Model {
    protected $table = 'relation';
    protected $fillable = ['id','relation_name'];

}