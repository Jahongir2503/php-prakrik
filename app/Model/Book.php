<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';
    public $timestamps = false;
    protected $fillable = [
        'book_id',
        'name',
        'year_of_publication',
        'price',
        'new_edition',
        'short_description',
        'img',
        'is_popular'
    ];
    protected $primaryKey = 'book_id';

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_of_books', 'book_id', 'author_id');
    }
    public function rentals()
    {
        return $this->hasMany(book_rentals::class, 'book_id', 'book_id');
    }

}
