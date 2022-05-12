<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTalk extends Model
{
    use HasFactory;

    protected $table = 'item_talks';

    protected $fillable = [

        'name',
        'description',
        'id_group'

    ];
    
    public function group(){

        return $this->belongsTo(Group::class, 'id_group');
    }
}
