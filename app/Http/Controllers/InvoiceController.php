<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $invoices = DB::table('users')->join('invoices', 'users.id', '=', 'invoices.user_id')->select(
            '*'
        )->get()->reverse();


        return view('invoices', [
            'invoices' => $invoices,

        ]);
    }
    public function invoicesConfirmView(Request $request)
    {

        $invoices = DB::table('users')->join('invoices', 'users.id', '=', 'invoices.user_id')->select(
            '*'
        )->get()->reverse();

        $chosenInvoice = Invoice::find($_GET['invoice_id']);

        return view('invoicesconfirm', [
            'invoices' => $invoices,
            'chosen_invoice' => $chosenInvoice

        ]);
    }
}
