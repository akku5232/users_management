<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profiles';
    protected $fillable = [
       'user_id','present_location','prefered_location','sslc','puc','passed_out_year','stream','college_name','city_id','company_details','company_name','role','joining_date','skills'
    ];
}
