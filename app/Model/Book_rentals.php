<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Book_rentals extends Model
{
    use HasFactory;

    protected $table = 'book_rentals';
    public $timestamps = false;
    protected $fillable = [
        'rental_id',
        'book_id',
        'reader_id',
        'date_of_issue',
        'return_date',
        'status',
    ];
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    protected $primaryKey = 'rental_id';
}
