@extends('layout')
@section('content')

<body>
    <h1> Payments </h1>

    <div class="side-nav">
        <ul>
            <li><a href="/dashboard">Översikt</a></li>
            <li><a href="/profile">My profile</a></li>
            <li><a href="/payments">Payments</a></li>
        </ul>
    </div>

    <h2>Här är alla fakturor</h2>
    @foreach ($invoices as $invoice)
    <div>
        <p>
            <a href="/payments/{{$invoice->id}}"> {{$invoice->created_at}}</a>
        </p>
        @if ($invoice->paid)
        <p>✔</p>
        @endif
        <p></p>



    </div>
    @endforeach

    <h2>Faktura preview</h2>
    <div>

        <h2>Invoice {{$clicked_invoice->id}}</h2>

        <img />
        <hr>
        <h3>Company name</h3>
        <p>Address line 1</p>
        <p>Postal code and city</p>
        <p>Country</p>
        <p>Telefonnummer</p>

        <h3>To</h3>
        <p>{{$user->firstname . " " . $user->lastname}}</p>
        <p>{{$user->address}}</p>
        <p>{{$user->postal_code . " " . $user->city}}</p>
        <p>{{$user->country}}</p>

        <div>
            <p>Invoice date: {{date("Y-m-d")}}</p>
            <p>Invoice number: #{{$clicked_invoice->id}}
            </p>
            <p>Client reference: {{$user->id}}
            </p>
            <p>Due date: {{$clicked_invoice->due_date}}</p>
            <p>Terms: 30 days</p>
        </div>

        <hr>
        <table>
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
                <td>$ {{$membership->price}}

                </td>
                <td>20%</td>
                <td>$ {{$VAT}}

                </td>
                <td>$ {{$clicked_invoice->total_amount}} </td>
            </tr>
        </table>

        <p>Sub total: $ {{$membership->price}}

        </p>
        <p>Total VAT: $ {{$VAT}}

        </p>
        <p>Total amount due: $ {{$clicked_invoice->total_amount}}

        </p>

        <hr>
        <div>
            <div>
                <p>Registered address</p>
                <p>Adress Line 1</p>
                <p>City, Postal Code</p>
                <p>Country</p>
            </div>
            <div>
                <p>Contact information</p>
                <p>Namn på företaget</p>
                <p>Phone number:</p>
                <p>Email:</p>
            </div>
            <div>
                <p>Payment details</p>
                <p>Bank name:</p>
                <p>Sort-Code:</p>
                <p>Account No.</p>
            </div>
        </div>

    </div>


</body>

</html>
@endsection
