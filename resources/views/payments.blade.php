<link rel="stylesheet" href="../stylesheets/payments.css">
@include('profilenavbar')

<div class="payments-body">
    <div class="grid-container">
        <div class="item1">
            @if(session()->has('message'))
            <div class="session-message">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="item2">
            @include('sidenav')
        </div>
        <div class="filler-item"></div>
        <div class="item3">
            <h2 class="payments-heading">Invoice history</h2>
            @foreach ($invoices as $invoice)
            <a href="/payments/{{$invoice->id}}">
                <div class="invoice">
                    <p>
                        {{$invoice->created_at}}
                    </p>
                    <p> </p>
                    @if ($invoice->paid)
                    <p>✔</p>
                    @else <p></p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        <div class="item4">
            @if (count($invoices) > 0)
            <div class="invoice-preview">
                <div class="invoice-header">
                    @if ($clicked_invoice->paid)
                    <p>Invoice (paid)
                    </p>
                    @else
                    <p>Invoice</p>
                    @endif
                    <img src="/assets/logo-orange.svg" />
                </div>
                <hr>

                <div class="invoice-sub-header">
                    <div class="invoice-contact">
                        <div>
                            <p>To</p>
                            <p>{{$clicked_invoice->firstname . " " . $clicked_invoice->lastname}}</p>
                            <p>{{$clicked_invoice->address}}</p>
                            <p>{{$clicked_invoice->postal_code . " " . $clicked_invoice->city}}</p>
                            <p>{{$clicked_invoice->country}}</p>
                        </div>
                    </div>

                    <div class="invoice-details">
                        <div class="invoice-details-one">
                            <p>Invoice date </p>
                            <p>Invoice number</p>
                            <p>Client reference
                            </p>
                            <p>Due date </p>
                            <p>Terms </p>
                        </div>
                        <div class="invoice-details-two">
                            <p>{{date("Y-m-d")}}</p>
                            <p> #000{{$clicked_invoice->id}}
                            </p>
                            <p>{{$user->id}}
                            </p>
                            <p> {{$clicked_invoice->due_date}}</p>
                            <p>30 days</p>
                        </div>
                    </div>
                </div>

                <hr>
                <table class="invoice-table">
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit price</th>
                        <th>VAT %</th>
                        <th>VAT</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>
                            {{$membership->type}}
                        </td>
                        <td>
                            1
                        </td>
                        <td>$ {{$membership->price}}.00
                        </td>
                        <td>20%</td>
                        <td>$ {{$VAT}}.00
                        </td>
                        <td>$ {{$clicked_invoice->total_amount}}.00 </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td></td>
                        <td>
                            <div class="invoice-total-one">
                                <p>Sub total</p>
                                <p>Total VAT</p>
                                <p>Total amount</p>
                            </div>
                        </td>
                        <td>
                            <div class="invoice-total-two">
                                <p>${{$membership->price}}.00
                                </p>
                                <p>${{$VAT}}.00
                                </p>
                                <p>${{$clicked_invoice->total_amount}}.00
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>

                <hr>
                <div class="invoice-footer">
                    <div>
                        <p>Ananda Yoga</p>
                        <p>Beraban, Kediri, Tabanan</p>
                        <p>82121 Bali</p>
                        <p>Indonesia</p>
                        <p>info@anandayoga.com</p>
                        <p>+62 36 123 456 123</p>
                    </div>
                    <div>
                        <p>Payment details</p>
                        <div>
                            <p>Bank name Lorem ipsum</p>
                            <p>Sort-Code 12-34-56</p>
                            <p>Account No. 1234 5678 9012</p>
                        </div>
                        <div>
                            <p>Lorem ipsum</p>
                            <p>12-34-56</p>
                            <p>1234 5678 9012</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
