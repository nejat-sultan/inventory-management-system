<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['Name', 'Image', 'Description','CategoryID', 'SupplierID', 'Barcode', 'UnitPrice', 'UnitID'];
  
    use HasFactory;

        public function category()
        {
            return $this->belongsTo(Category::class,'CategoryID');
        }

        public function supplier()
        {
            return $this->belongsTo(Supplier::class,'SupplierID');
        }

        public function unit()
        {
            return $this->belongsTo(Unit::class,'UnitID');
        }
}
