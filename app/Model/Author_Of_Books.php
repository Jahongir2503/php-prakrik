<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class author_of_books extends Model
{
    use HasFactory;

    protected $table = 'author_of_books';
    public $timestamps = false;
    protected $fillable = [
        'author_book_id',
        'book_id',
        'author_id',
    ];

    protected $primaryKey = 'author_book_id';
}
