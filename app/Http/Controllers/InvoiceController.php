<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Seller;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Quotation $quotation) {
        
        $customer = new Party([
            'name'          => $quotation->name,
            'company'       => $quotation->company,
            'email'         => $quotation->email,
            'phone'         => $quotation->phone,
        ]);
        
        $seller = new Party([
            'name'          => 'StarCity',
            'phone'         => '+974 3009 3821',
            'address'       => 'PO box No; 16772',
            'address_1'     => 'DOHA, QATAR',
            'email'         => 'Starcityqa@gmail.com',
        ]);
        
        $items = QuotationItem::where('quotation_id', $quotation->id )->get();
        foreach( $items as $item){
            $itemList[] = InvoiceItem::make( $item->name )
                            ->quantity( $item->qty )
                            ->units( $item->product->unit )
                            ->pricePerUnit( $item->price ?? 0 );
        }
        
        $invoice = Invoice::make()
            ->seller($seller)
            ->buyer($customer)
            ->currencySymbol('QAR')
            ->currencyCode('QAR')
            ->currencyFraction('QAR')
            ->logo(public_path('images/logo.png'))
            ->serialNumberFormat('{SEQUENCE}')
            ->dateFormat('d/m/Y')
            ->addItems($itemList);
        
        return $invoice->stream();
    }


    public static function  numberToWord( $number ) {

        // $hyphen      = '-';
        // $conjunction = ' and ';
        $hyphen      = ' ';
        $conjunction = ' ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );
    
        if (!is_numeric($number)) {
            return false;
        }
    
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'self::numberToWord only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }
    
        if ($number < 0) {
            return $negative . self::numberToWord(abs($number));
        }
    
        $string = $fraction = null;
    
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
    
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . self::numberToWord($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = self::numberToWord($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= self::numberToWord($remainder);
                }
                break;
        }
    
        // if (null !== $fraction && is_numeric($fraction)) {
        //     $string .= $decimal;
        //     $words = array();
        //     foreach (str_split((string) $fraction) as $number) {
        //         $words[] = $dictionary[$number];
        //     }
        //     $string .= implode(' ', $words);
        // }
        if (null !== $fraction && is_numeric($fraction)) {
            $string   .= ' & ';
            $string   .= substr($fraction, 0, 2).'/100';
        }
    
        return $string;
    }
}
