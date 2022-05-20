<?php

namespace App\Models;

// use App\Http\Controller\TransactionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable =  ['harga', 'metode_bayar', 'bukti_bayar'];
}
