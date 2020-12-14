<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model {
    protected $table = 'employee';
    protected $fillable = ['id','emp_name','emp_surname','emp_en_name','emp_en_surname','emp_nickname','emp_start_work','emp_start_emp'
    ,'de_id','team_id','pos_id','emp_birthday','emp_numberID','emp_bankID','bank_id','emp_phone','emp_address','current_address','emp_email'
    ,'emp_comp_e_mail','type_emp_id','salary','other'];

}