@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">ADD SUPPLIER</h4>
            @if (Auth::user()->is_admin == 1)
                <a style="padding: 5px 15px;" href="{{ route('suppliers.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>
    </div>
</div>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            {{-- <h3 class="card-title text-center">FORM</h3> --}}
            <form action="{{ route('store.supplier') }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Name <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" name="name" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Contact <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="number" class="form-control" name="contact" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Email <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="email" class="form-control" name="email" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Address <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" name="address" placeholder="" required/>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-success" type="submit" style="padding: 10px 35px;"><i class="fas fa-save"></i>  SUBMIT</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
