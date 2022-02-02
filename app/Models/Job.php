<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug', 'description','thumbnail','job_type_id','job_location','dead_line'];

    protected $casts = ['thumbnail' => 'array'];

    protected $attributes = ['thumbnail' => '[]'];

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }
    public function applicants(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function getDeadLineAttribute($value)
    {
        if ($value) {
            return date('m/d/Y', strtotime($value));
        } else {
            return null;
        }
    }
    public function setDeadLineAttribute($value)
    {
        if ($value) {
            $this->attributes['dead_line'] =  date('Y-m-d', strtotime($value));
        } else {
            $this->attributes['dead_line'] = null;
        }
    }
}
