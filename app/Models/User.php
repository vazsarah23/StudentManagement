<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id){
        return  self::find($id);
    }

    static public function getAdmin(){
        
        $return = self::select('users.*')->where('user_type','=',1)->where('is_delete','=',0);
        if(!empty(Request::get('name'))){
            $return = $return->where('name','like', '%'.Request::get('name').'%');
        }

        if(!empty(Request::get('email'))){
            $return = $return->where('email','like', '%'.Request::get('email').'%');
        }
        $return = $return->orderBy('id','desc')->paginate(15);
        return $return;
    }

    static public function getStudent(){
        
        $return = self::select('users.*')->where('users.user_type','=',3)->where('users.is_delete','=',0);
        
        $return = $return->orderBy('users.id','desc')->paginate(15);
        return $return;
    }

    static public function getTeacher(){
        
        $return = self::select('users.*')->where('users.user_type','=',2)->where('users.is_delete','=',0);
        
        $return = $return->orderBy('users.id','desc')->paginate(15);
        return $return;
    }
    //self means using user class
    static public function getEmailSingle($email){
        return User::where('email', '=', $email)->first();
    }

    public function getProfile(){
        if(!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)){
            return url('upload/profile/' . $this->profile_pic);
        }
        else{
            return "";
        }
    }

    public function getSSC(){
        if(!empty($this->sscmarksheet) && file_exists('upload/marksheet/' . $this->sscmarksheet)){
            return url('upload/marksheet/' . $this->sscmarksheet);
        }
        else{
            return "";
        }
    }

    public function getHSSC(){
        if(!empty($this->hsscmarksheet) && file_exists('upload/marksheet/' . $this->hsscmarksheet)){
            return url('upload/marksheet/' . $this->hsscmarksheet);
        }
        else{
            return "";
        }
    }

    public function getGrad(){
        if(!empty($this->graduationmarksheet) && file_exists('upload/marksheet/' . $this->graduationmarksheet)){
            return url('upload/marksheet/' . $this->graduationmarksheet);
        }
        else{
            return "";
        }
    }

}
