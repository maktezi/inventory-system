@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Suppliers</h4>
                <a href="{{ route('add.supplier') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">ADD</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    {{-- <table id="selection-datatable" class="table dt-responsive nowrap w-100"> --}}
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                    {{-- <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>CONTACT</th>
                            <th>EMAIL</th>
                            <th>ADDRESS</th>
                            <th>DATE ADDED</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td class="text-wrap"><b>{{ ($supplier->name) }}</b></td>
                                <td class="text-wrap">{{ ($supplier->contact) }}</td>
                                <td class="text-wrap">{{ ($supplier->email) }}</td>
                                <td class="text-wrap">{{ ($supplier->address) }}</td>
                                <td class="text-wrap">{{ ($supplier->created_at) }}</td>
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('edit.supplier', $supplier->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                        {{-- <a href="{{ route('delete.annexf2316', $AnnexF2316->id) }}" type="button" onclick="myFunction()" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;"><i class="ri-delete-bin-2-fill"></i></a> --}}
                                        <a href="{{ route('delete.supplier', $supplier->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

    <script>
        function confirmDelete(event) {
            if (!confirm("Are you sure you want to delete?")) {
                event.preventDefault();
            }
        }
    </script>

@endsection
