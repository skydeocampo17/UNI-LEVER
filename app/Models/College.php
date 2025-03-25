<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $table = 'colleges';
    protected $primaryKey = 'CollegeID';
    public $timestamps = true;

    protected $fillable = [
        'CollegeName',
        'CollegeCode',
        'IsActive',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'CollegeID', 'CollegeID');
    }
}
