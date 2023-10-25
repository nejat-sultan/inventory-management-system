<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = ['Name', 'InvoiceNo', 'Date','CategoryID', 'ProductID', 'Quantity', 'CustomerID', 'PaidStatus', 'Amount'];
    
    use HasFactory;

    
    public function category()
    {
        return $this->belongsTo(Category::class,'CategoryID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'ProductID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'CustomerID');
    }
}
