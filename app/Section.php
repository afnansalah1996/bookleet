<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $table = 'sections';

  protected $fillable = [  'name'  ];

  public function company(){
    return $this->hasMany('App\Company');

}
}
