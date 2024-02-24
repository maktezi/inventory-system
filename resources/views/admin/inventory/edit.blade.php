@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">EDIT INVENTORY</h4>
            @if (Auth::user()->is_admin == 1)
                <a style="padding: 5px 15px;" href="{{ route('inventories.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>
    </div>
</div>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            {{-- <h3 class="card-title text-center">FORM</h3> --}}
            <form action="{{ route('update.inventory', $data->id) }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Item <small>(required)</small></label>
                            <select name="item_id" class="form-control" required>
                                <option value="{{ ($data->item_id) }}">{{ ($data->item->name) }}</option>
                                @foreach ($items as $item)
                                    @if ($item->id != $data->item_id)
                                        <option value={{ ($item->id) }}>{{ ($item->name) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Supplier <small>(required)</small></label>
                            <select name="supplier_id" class="form-control" required>
                                <option value="{{ ($data->supplier_id) }}">{{ ($data->supplier->name) }}</option>
                                @foreach ($suppliers as $supplier)
                                    @if ($supplier->id != $data->supplier_id)
                                        <option value={{ ($supplier->id) }}>{{ ($supplier->name) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Brand <small>(required)</small></label>
                            <select name="brand_id" class="form-control" required>
                                <option value="{{ ($data->brand_id) }}">{{ ($data->brand->name) }}</option>
                                @foreach ($brands as $brand)
                                    @if ($brand->id != $data->brand_id)
                                        <option value={{ ($brand->id) }}>{{ ($brand->name) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Stocks <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="number" class="form-control" name="stocks" value="{{ ($data->stocks) }}" required/>
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
