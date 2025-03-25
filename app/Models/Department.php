<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $primaryKey = 'DepartmentID';
    public $timestamps = true;

    protected $fillable = [
        'CollegeID',
        'DepartmentName',
        'DepartmentCode',
        'IsActive',
    ];

    public function college()
    {
        return $this->belongsTo(College::class, 'CollegeID', 'CollegeID');
    }
}
