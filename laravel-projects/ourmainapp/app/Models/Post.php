<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    public function toSearchableArray() {
        return [
            'title' => $this->title,
            'body' => $this->body
        ];
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // default post thumbnail set
    protected function thumb():Attribute {
        return Attribute::make(get: function($value){
            return $value ? '/storage/thumb/' . $value : '/default-thumb.jpg';
        }); 
    }
}
