@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>Prescriptions List</h4>
                    @if ($prescriptions->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Delivery Address</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Delivery Time</th>
                            <th scope="col">Note</th>
                            <th scope="col">Quotation</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($prescriptions as $prescription)
                          <tr>
                            <td>{{ $prescription->users->name }}</td>
                            <td>{{ $prescription->address }}</td>
                            <td>{{ $prescription->date }}</td>
                            <td>{{ $prescription->time }}</td>
                            <td>{{ $prescription->note }}</td>
                            <td>
                                <a href="{{URL::route('ViewQuotation', ['id' => Crypt::encrypt($prescription->id)])}}" class="btn-sm btn btn-success" type="button">View Quotations</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 class="text-danger">No Prescriptions</h3>
                    @endif
                    <a class="btn btn-primary" href={{URL::route('createPrescription')}}>Create a new Prescription</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
