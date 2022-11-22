<link rel="stylesheet" href="../stylesheets/invoices.css">
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
                        {{$invoice->total_amount}}
                    </td>
                    <td>

                    </td>
                    <td>
                        @if (!$invoice->paid)
                        <form action="confirm-payment" method="POST">
                            @csrf
                            <input type="hidden" value="<?= $invoice->id ?>" name="invoice_id">
                            <button class="invoice-paid-button" type="submit" onclick="return confirm('Are you sure you want to confirm this invoice as paid?')">Comfirm as paid</button>
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
