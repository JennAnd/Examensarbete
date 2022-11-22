<link rel="stylesheet" href="../stylesheets/invoices.css">
<link rel="stylesheet" href="../stylesheets/popup.css">
@include('adminnavbar')

<div class="adminpanel-body">
    <div class="grid-container">
        <div class="item1">
            @if(session()->has('message'))
            <div class="session-message">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="item2">
            @include('admin-sidenav')
        </div>
        <div class="item3">
            <h2 class="all-invoices">
                All invoices
            </h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Invoice No.</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Total</th>

                </tr>
                @foreach ($invoices as $invoice)
                <tr>
                    <td>
                        {{$invoice->firstname . " " . $invoice->lastname}}
                    </td>
                    <td>
                        {{$invoice->id}}
                    </td>
                    <td>
                        {{$invoice->created_at}}
                    </td>
                    <td>
                        {{$invoice->due_date}}
                    </td>
                    <td>
                        ${{$invoice->total_amount}}.00
                    </td>
                    <td>

                    </td>
                    <td>
                        @if (!$invoice->paid)
                        <form action="confirm-payment" method="POST">
                            @csrf
                            <input type="hidden" value="<?= $invoice->id ?>" name="invoice_id">
                            <button class="invoice-paid-button" type="submit">Confirm as paid</button>
                        </form>
                        @else
                        <p>✔</p>
                        @endif
                    </td>

                    @endforeach

                </tr>
            </table>
        </div>
    </div>
</div>


<!-- Pop up -->
<div class="popup-background"></div>
<div class="popup-box">
    <div class="popup-details">
        <p class="popup-heading">Invoice details</p>
        <p>Name: {{$chosen_invoice->firstname}} {{$chosen_invoice->lastname}}</p>
        <p>Invoice No. #000{{$chosen_invoice->id}}</p>
        <p>Invoice Date: {{date('Y-m-d', strtotime($chosen_invoice->created_at))}}</p>
        <p>Due date: {{$chosen_invoice->due_date}}</p>
        <p>Total amount: ${{$chosen_invoice->total_amount}}.00</p>
    </div>
    <div>
        <p class="popup-confirm">
            Are you sure you want to confirm as paid?
        </p>
    </div>
    <div class="buttons">
        <form action="/invoices">
            <button class="cancel-button">Cancel</button>
        </form>
        <form action="/confirm-payment" method="POST">
            @csrf
            <input type="hidden" value="<?= $_GET['invoice_id'] ?>" name="invoice_id" id="invoice_id">
            <button class="book-button">Yes</button>
        </form>
    </div>
</div>
