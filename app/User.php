<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements authenticatable
{
    use \Illuminate\Auth\Authenticatable;
}
