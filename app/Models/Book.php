<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Book extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    public function bookcase(){
        return $this->belongsTo(Bookcase::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function collection_book(){
        return $this->belongsTo(CollectionBook::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
