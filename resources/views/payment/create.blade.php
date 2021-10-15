@extends('layouts.app')

@section('title')
    Youth Airline
@endsection

@section('content')
<div class="container py-5">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12">
          <form id="form1" action="{{ route('payment.store', ['payment_amount' => $ticketAmount, 'payment_date' => $payment_date, 'payment_id' => $payment_id, 'pnr' => $pnr]) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="col-6">
                                    <span>PAYMENT DETAILS</span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>To</h3>
                                    <h5>{{ auth()->user()->name }}</h5>
                                    <p>Email : {{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date" style="list-style: none;">
                                    <li>Date : {{ $todayDate }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-table table-responsive mt-5">
                            <table class="table table-bordered table-hover text-right">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center" style="width: 5%;">id</th>
                                        <th class="text-left" style="width: 45%; min-width: 130px;">description</th>
                                        <th>Travellers</th>
                                        <th style="min-width: 100px">Unit Cost</th>
                                        <th>total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Passengers</td>
                                        <td>{{ session()->get('no_of_passenger') }}</td>
                                        <td>Rs.{{ $ticketPrice }}</td>
                                        <td>Rs.{{ $ticketAmount }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">total amount :</td>
                                        <td>R<span style="text-transform: lowercase;">s. </span>{{ $ticketAmount }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-buttons text-right">
                        <a href="#" onclick="document.getElementById('form1').submit();" class="invoice-btn text-decoration-none">Pay with Esewa</a>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
</div>
{{--
      <input class="btn btn-primary ml-5" value="Pay with Esewa" type="submit">


      <!-- <input type="submit" value="Pay Now" name="pay_now" class="btn btn-primary ml-5 mt-4"> -->

    <!-- <form action="https://uat.esewa.com.np/epay/main" method="POST">
    <input value="{{ $totalAmount }}" name="tAmt" type="hidden">
    <input value="{{ $totalAmount }}" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="epay_payment" name="scd" type="hidden">
    <input value="{{ $pnr }}" name="pid" type="hidden">
    <input value="{{ route('esewa.success') }}" type="hidden" name="su">
    <input value="{{ route('esewa.fail') }}" type="hidden" name="fu">
    <input class="btn btn-primary ml-5" value="Pay with Esewa" type="submit">
    </form> -->
      <!-- <p class="ml-5 mt-3"><span><strong>Note:</strong></span> Your Payment/Transaction ID is <strong>{{ $payment_id }}</strong>. Please note it down.</p> -->
  </form>
  --}}
</div>

@endsection
