@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a new Prescription') }}</div>

                <div class="card-body">
                    <form action="{{ route('postPrescription') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="images">Upload Images up to 5</label>
                            <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
                            @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="note">Note</label>
                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="3"></textarea>
                            @error('note')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="address">Delivery Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Delivery Address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="date">Delivery Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="time">Delivery Time</label>
                            <input type="time" list="time" name="time" class="form-control @error('time') is-invalid @enderror"/>
                               <datalist id="time">
                                <option value="8:00"></option>
                                <option value="10:00"></option>
                                <option value="12:00"></option>
                                <option value="14:00"></option>
                                <option value="16:00"></option>
                                <option value="18:00"></option>
                                <option value="20:00"></option>
                               </datalist>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Send to the pharmacy</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
