<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            body{font-family:arial,sans-serif;padding:0;margin:0;}#quotation{padding:15px;width:800px;margin:0 auto}#bigi{font-size:28px;font-weight:bold;color:#ad132f;padding:5px}#company,#quoinfo{margin-bottom:20px}#company img{max-width:180px;height:auto}#quoinfo,#company,#items{width:100%;border-collapse:collapse}#quoinfo td{width:33%}#quoinfo td,#items td,#items th{padding:10px}#items th{border-top:1px solid #ccc;border-bottom:1px solid #ccc}#items td{border-bottom:1px solid #ccc}.idesc{color:#999}.ttl{background:#fafafa}.right{text-align:right}#notes,#accept{margin-top:30px}#notes{padding:10px;background:#efefef}#accept table{width:100%;border-collapse:collapse}#accept td{border:1px solid #bbb;padding:10px 10px 50px 10px;color:#a5a5a5}
            .text-center{text-align: center}
            .text-left{text-align: left}
            .border-l{ border-left: 1px solid #ccc}
            .border-r{ border-right:1px solid #ccc}
            .w-5{ width:5mm;}
            .w-10{ width:10mm;}
            .w-75{ width:75mm;}
            .s-15{ font-size: 15px;}
            .f-700{
                font-weight:700;
            }
            .wp-60{width: 60%;}
            .wp-30{width: 30%;}
            .inline{ display: inline-block;}
            .mt-10{
                margin-top: 10mm;
            }
            .bg-gray{
                background-color: #ccc;
            }
            .border{
                border: 1px solid #ccc;
            }
            .p-5{
                padding: 5mm;
            }
        </style>
    </head>

    <body>
        <!-- (A) HEADER -->
        <table id="company"><tr>
            @if($invoice->logo)
            <td><img src="{{$invoice->logo}}"></td>
            @endif
            <td class="right">
                {{ $invoice->seller->name }}<br/>
                {{ $invoice->seller->phone }}<br/>
                {{ $invoice->seller->email }}<br/>
                {{ $invoice->seller->address }}<br/>
                {{ $invoice->seller->address_1 }}<br/>

            </td>
        </tr></table>

        <!-- (B) CUSTOMER & INFO -->
        <div id="bigi">QUOTATION</div>
        <table id="quoinfo">
            <tr>
                <td>
                    <strong>CUSTOMER</strong><br>  
                    @if($invoice->buyer->name){{$invoice->buyer->company}} <br/>@endif
                    @if($invoice->buyer->name){{$invoice->buyer->name}} <br/>@endif
                    {{$invoice->buyer->email}} <br/>
                    {{$invoice->buyer->phone}} <br/>
                </td>
                <td class="right">
                    <strong>Quotation: </strong>#{{ $invoice->getSerialNumber() }} <br/>   
                    <strong>Date: </strong>{{ $invoice->getDate() }}   
                </td>
            </tr>
        </table>

        <!-- (C) ITEMS & TOTALS -->
        <table id="items">
            <tr>
                <th class="border-l border-r w-5 s-15">S.No</th>
                <th class="text-left border-r w-75 s-15">Item</th>
                <th class="text-center border-r w-5 s-15">Unit</th>
                <th class="text-center border-r w-5 s-15">QTY</th>
                <th class="text-center border-r w-10 s-15">Unit Price</th>
                <th class="text-center border-r w-10 s-15">Amount</th>
            </tr>
            @php $i = 0 @endphp
            @foreach($invoice->items as $item)
                @php $i = $i + 1 @endphp
                <tr>
                    <td class="text-center border-l border-r w-5 s-15"> {{ $i }}</td>
                    <td class="border-r w-75 s-15"> {{ $item->title }}</td>
                    <td class="text-center border-r w-15 s-15"> {{ $item->units }}</td>
                    <td class="text-center border-r w-5 s-15">{{ $item->quantity }}</td>
                    <td class="text-center border-r w-10 s-15">{{ $item->price_per_unit }}</td>
                    <td class="text-center border-r w-10 s-15">{{ $item->sub_total_price }}</td>
                </tr>
            @endforeach
             <tr class='ttl'>
                <td class='border-l border-r s-15' colspan='4'>Qatari Riyal {{ucwords( App\Http\Controllers\InvoiceController::numberToWord( $invoice->total_amount ) )}} Only</td>
                <td class='border-l border-r s-15 f-700'>Total</td>
                <td class="text-center border-r s-15 f-700">{{ $invoice->total_amount }}</td>
            </tr>
            
        </table>

        <!-- (D) NOTES -->
        <div class="s-15 border mt-10">
            <div class="wp-60 inline mt-10 p-5">
                <div class="f-700">TERMS & CONDITIONS</div> <br/>
                DELIVERY : EXSTOCK SUBJECT TO PRIOR TO SALE<br/>
                DELIVERY : ON SITE <br/>
                VALIDITY : 14 DAYS <br/>
            </div>
            <div class="wp-30 inline right">
                <img style="width: 30mm" src="{{public_path('images/stamp.jpg')}}">
            </div>
        </div>

        
    </body>
</html>
