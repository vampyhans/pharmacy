@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>Quotations List</h4>
                    @if ($quotations->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $quotation)
                          <tr>
                            <td>{{ $quotation->drugs->sum('total') }}</td>
                            <td>{{ $quotation->status }}</td>
                            <td>
                              <a href="{{URL::route('ViewQuotationDetails', ['id' => Crypt::encrypt($quotation->id)])}}" class="btn-sm btn btn-success" type="button">View Quotation</a>
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 class="text-danger">No Quotations</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
