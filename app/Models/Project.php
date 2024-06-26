<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'slug', 'is_completed', 'type_id'];
    protected $with = ['author', 'type', 'technologies'];

    public function getFormattedDate($column, $format = 'd-m-Y')
    {
        return Carbon::create($this->$column)->format($format);
    }
    public function getAbstract($length)
    {
        $abstract = substr($this->description, 0, $length);
        if (strlen($this->description) > 100) {
            $abstract = $abstract . '...';
        }

        return  $abstract;
    }
    public function printImage()
    {
        return asset('storage/' . $this->image);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    // Accessor to get images' absolute path
    public function image(): Attribute
    {
        return Attribute::make(fn ($value) => $value
            /**&& app('request')->is('api/*')*/
            ? url('storage/' . $value) : null);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
