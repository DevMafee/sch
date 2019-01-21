<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    public function class()
    {
    	return $this->belongsTo( \App\Classes::class, 'class_id', 'id' );
    }

    public function session()
    {
    	return $this->belongsTo( \App\Session::class, 'session_id', 'id' );
    }

    public function section()
    {
        return $this->belongsTo( \App\Sections::class, 'section_id', 'id' );
    }


}
