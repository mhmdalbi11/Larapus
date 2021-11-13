<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    //memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['title', 'author_id', 'amount', 'cover'];

    //memberikan akses data apa saja yang bisa diisi
    protected $fillable = ['title', 'author_id', 'amount', 'cover'];

    //mencatat waktu pembuatan dan update data otomatis
    public $timestamps = true;

    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
    public function image()
    {
        if ($this->cover && file_exists(public_path('images/books/' . $this->cover))) {
            return asset('images/books/' . $this->cover);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/books/' . $this->cover))) {
            return unlink(public_path('images/books/' . $this->cover));
        }

    }
}
