@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Brands</h4>
                <a href="{{ route('add.brand') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">ADD</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                    {{-- <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>DATE ADDED</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td class="text-wrap"><b>{{ ($brand->name) }}</b></td>
                                <td class="text-wrap">{{ ($brand->created_at) }}</td>
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('edit.brand', $brand->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                        <a href="{{ route('delete.brand', $brand->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
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
