<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'companies';

  protected $fillable = [
      'company_name',  'responsible_name', 'email', 'mobile_nom'  ,'sections_id'  ];


      public function section(){
      return $this->belongsTo(Section::class,'sections_id','id');
    }
}
