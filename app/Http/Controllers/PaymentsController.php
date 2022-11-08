<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $invoices = Invoice::select('*')->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->get();
        $latestInvoice = Invoice::select('*')->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->limit(1)->get();
        foreach ($latestInvoice as $latest) {
            $membership = Membership::find($latest->membership_id);
            $VAT = $membership->price * 0.2;
            $id = $latest->id;
        }

        $clickedInvoice = Invoice::find($id);

        return view('payments', [
            'user' => $user,
            'invoices' => $invoices,
            'latest_invoice' => $latestInvoice,
            'membership' => $membership,
            'VAT' => $VAT,
            'clicked_invoice' => $clickedInvoice
        ]);
    }

    public function showClickedInvoice($id)
    {

        $user = Auth::user();
        $userId = $user->id;
        $clickedInvoice = Invoice::find($id);
        $invoices = Invoice::select('*')->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->get();
        $latestInvoice = Invoice::select('*')->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->limit(1)->get();
        foreach ($latestInvoice as $latest) {
            $membership = Membership::find($latest->membership_id);
            $VAT = $membership->price * 0.2;
        }

        return view('payments', [
            'user' => $user,
            'invoices' => $invoices,
            'latest_invoice' => $latestInvoice,
            'membership' => $membership,
            'VAT' => $VAT,
            'clicked_invoice' => $clickedInvoice
        ]);
    }
}
