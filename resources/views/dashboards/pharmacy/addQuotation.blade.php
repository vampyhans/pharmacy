@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Add Quotation') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                          <div class="grid-container">
                            @foreach ($prescription->images as $image)
                            <img src="{{ URL::to($image->url) }}" class="card-img-top">
                            @endforeach
                          </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                  <div class="container">
                                    <form action="{{ route('saveQuotation') }}" method="post">
                                      @csrf
                                      @php
                                      $prescription_id = $prescription->id;
                                      @endphp
                                      <input type="hidden" name="prescription_id" value="{{ $prescription_id }}">
                                      <input type="hidden" name="customer" value="{{ $prescription->user_id }}">
                                      <table class="_table">
                                        <thead>
                                          <tr>
                                            <th>Drug</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>
                                              <div class="action_container">
                                                <a class="btn-success btn" onclick="create_tr('table_body')">
                                                  +
                                                </a>
                                              </div>
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody id="table_body">
                                          <tr>
                                            <td>
                                              <input type="text" class="form-control" name="drug[]"> 
                                            </td>
                                            <td>
                                              <input type="number" class="form-control" name="quantity[]"> 
                                            </td>
                                            <td>
                                              <input type="number" step="0.1" class="form-control" name="price[]"> 
                                            </td>
                                            <td>
                                              <div class="action_container">
                                                <a class="btn btn-danger" onclick="remove_tr(this)">
                                                  -
                                                </a>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <button type="submit" class="mt-5 btn btn-primary">Send Quotation</button>
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