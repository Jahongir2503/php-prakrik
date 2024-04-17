<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Author extends Model
{
    use HasFactory;

    protected $table = 'author';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
    ];

    protected $primaryKey = 'author_id';

}
