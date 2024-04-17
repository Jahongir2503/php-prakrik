<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class reader extends Model
{
    use HasFactory;

    protected $table = 'reader';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'phone_number',
        'address',
        'number_library_card'
    ];
}
