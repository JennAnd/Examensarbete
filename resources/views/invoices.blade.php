<h2>
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
                <button>Confirm as paid</button>
            </form>
            @else
            <p>✔</p>
            @endif
        </td>

        @endforeach

    </tr>
</table>
