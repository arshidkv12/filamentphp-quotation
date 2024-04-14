<div>
    <table>
        <tr>
            <td class="font-bold pb-4">TOTAL QR : {{$total_price}}</td>
        </tr>
        <tr>
            <td class="">
                <x-filament::button
                    href="{{url('/invoice/'.$quotation->id)}}"
                    tag="a"
                    target='_blank'
                    class="m-4"
                >
                    Download Quotation
                </x-filament::button>
            </td>
            <td class="px-2">
                <livewire:send-quotation :quotation="$quotation" key="send-{{$quotation->id}}" />
            </td>
        </tr>
    </table>
</div>
