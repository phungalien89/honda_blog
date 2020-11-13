<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    public function profileImage()
    {
        $imgPath = strpos(strtolower($this->profileImage), '.') > -1 ? $this->profileImage : 'uploads/profile/Unavailable.png';
        return '/storage/'.$imgPath;
    }
    //
    protected $fillable = [
      'title',
      'description',
      'profileImage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
