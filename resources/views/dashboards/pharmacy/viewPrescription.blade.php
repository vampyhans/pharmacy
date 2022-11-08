@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Prescription Details') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row">Customer Name</th>
                            <td>{{ $prescription->users->name }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Delivery Address</th>
                            <td>{{ $prescription->address }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Delivery Address</th>
                            <td>{{ $prescription->time }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Delivery Address</th>
                            <td>{{ $prescription->date }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Note</th>
                            <td>{{ $prescription->note }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        @foreach ($prescription->images as $image)
                        <div class="col">
                            <div class="card" style="max-width: 50rem">
                               <div class="card-body">
                                <a href="{{ URL::to($image->url) }}" download>
                                    <img src="{{ URL::to($image->url) }}" class="card-img-top">
                                </a>
                                </div> 
                            </div>
                        </div>
                        @endforeach
                      </div>
                      <div class="ml-5 mt-5">
                        <a href="{{URL::route('addQuotation', ['id' => Crypt::encrypt($prescription->id)])}}" class="btn btn-primary" type="button">Create new quotation</a>
                      </div>
            </div>
        </div>
    </div>
</div>
@endsection
