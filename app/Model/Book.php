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
        'author_id',
        'name',
        'year_of_publication',
        'price',
        'new_edition',
        'short_description',
    ];
}
