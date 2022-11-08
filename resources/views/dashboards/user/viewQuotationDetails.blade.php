@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Quotation Deatils') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                          <div class="grid-container">
                            @foreach ($images as $image)
                            <img src="{{ URL::to($image->url) }}" class="card-img-top">
                            @endforeach
                          </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                  <div class="container">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                          <tr>
                                            <th scope="col">Drug</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($drugs as $drug)
                                          <tr>
                                            <td>{{ $drug->drug }}</td>
                                            <td>{{ $drug->quantity  }}</td>
                                            <td>{{ $drug->price  }}</td>
                                            <td>{{ $drug->total }}</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                    <h5>Total Bill is R.S. {{ $drugs->sum('total')  }}</h5>
                                  </div>
                                  <div class="btns d-flex justify-content-between">
                                    <form action="{{ route('acceptQuotation') }}"  method="POST">
                                      @csrf
                                      <input type="hidden" name="quotation" value="{{ $quotation[0]->id }}">
                                      <button type="submit" class="mt-5 btn btn-success">Accept Quotation</button>
                                    </form>
                                    <form action="{{ route('rejectQuotation') }}"  method="POST">
                                      @csrf
                                      <input type="hidden" name="quotation" value="{{ $quotation[0]->id }}">
                                      <button type="submit" class="mt-5 btn btn-danger">Reject Quotation</button>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

@section('import_script')


@endsection