<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $table = 'purchases';
    protected $primaryKey = 'id';
    protected $fillable = ['PurchaseNo', 'PurchaseDate', 'SupplierID','CategoryID', 'ProductID', 'Discount' ,'Quantity', 'TotalPrice'];
  
    use HasFactory;

        public function category()
        {
            return $this->belongsTo(Category::class,'CategoryID');
        }

        public function supplier()
        {
            return $this->belongsTo(Supplier::class,'SupplierID');
        }

        public function product()
        {
            return $this->belongsTo(Product::class,'ProductID');
        }

        public function stock()
        {
            return $this->belongsTo(Stock::class,'StockID');
        }
}
