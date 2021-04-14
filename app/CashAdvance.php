<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CashAdvance extends Model
{
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'rate_amount',
        'employee_id',
        'date',
    ];
    
    protected $casts = [
        'rate_amount' => 'float'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'date',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = ucwords($value);
    }

    public function getDateAttribute(){
        return date("M d, Y",strtotime($this->attributes['date']));
    }

    public function setDateAttribute($value){
        $this->attributes['date'] = date("Y-m-d",strtotime($value));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function employee(){
        return $this->hasOne(Employee::class,'id','employee_id');
    }
}
