<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Measure;
use App\Models\Transaction;

class CatatTransaksi extends Conversation
{
    protected $arraydata=[];

    public function run()
    {
        $this->datatransaksi();
    }

    public function datatransaksi()
    {
        $questiontransaction=Question::create('Pilih Jenis Transaksi : (Beli/Jual)')
        ->addButtons([
            Button::create('Jual')->value('jual'),
            Button::create('Beli')->value('beli')
        ]);
        $this->ask($questiontransaction,function(Answer $answer){
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue()==='jual') {
                    $this->transaksijual();
                } elseif ($answer->getValue()==='beli'){

                }
            }
        }); 
    }

    public function transaksijual()
    {
        $this->ask('Masukkan tanggal transaksi dengan format YYYY-MM-DD',function(Answer $answer){
            $this->arraydata['date']=$answer;
            $this->say('Transaksi tanggal : '.$answer);
            $this->transaksijuallanjut();
        });        
    }
    public function transaksijuallanjut(Type $var = null)
    {
        $this->ask('Masukkan data transaksi dengan format
        kodebarang,harga,jumlahbarang (dipisahkan dengan koma).',function(Answer $answer){
            $dataarray=explode(",",$answer);
            // $this->say('.'.$this->arraydata['date']);
            // $this->say('.'.$answer);
            // $this->arraydata['product_id']=$dataarray[0];
            // $this->arraydata['price']=$dataarray[1];
            // $this->arraydata['qty']=$dataarray[2];
            // $this->say('Tanggal Transaksi : '.$arraydata['date']);            
            // $this->say('Produk : '.$arraydata['product_id']);            
            // $this->say('Harga Barang : '.$arraydata['price']);            
            // $this->say('Quantity : '.$arraydata['qty']);
        });
    }
}
