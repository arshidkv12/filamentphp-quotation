<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'company'
    ];
    public function quotationItems(): HasMany { 
        return $this->hasMany( QuotationItem::class );
    }
}
