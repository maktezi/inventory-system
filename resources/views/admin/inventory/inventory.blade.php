@extends('layouts.app')
@section('content')

    <style>
        .red-text {
            color: red;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Inventories</h4>
                <a href="{{ route('add.inventory') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">ADD</a>
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
                            <th>ITEM</th>
                            <th class="text-center">STOCKS</th>
                            <th>BRAND</th>
                            <th>SUPPLIER</th>
                            {{-- <th class="text-center">ADD STOCK</th> --}}
                            {{-- <th>DATE ADDED</th> --}}
                            {{-- <th class="text-center">QR</th> --}}
                            <th class="text-center">RELEASE</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>

                                <td class="text-wrap"><b class="<?php echo $inventory->stocks < 51 ? 'red-text' : ''; ?>">{{ ($inventory->item->name) }}</b></td>
                                <td class="text-wrap text-center"><b class="<?php echo $inventory->stocks < 51 ? 'red-text' : ''; ?>">{{ ($inventory->stocks) }}</b></td>
                                <td class="text-wrap">{{ ($inventory->brand->name) }}</td>
                                <td class="text-wrap">{{ ($inventory->supplier->name) }}</td>

                                {{-- <td class="text-wrap text-center">
                                    <form method="POST" action="{{ route('product.add-stock', ['id' => $inventory->id]) }}">
                                        @csrf
                                        <button type="submit" style="padding: 5px 10px; border: none;">
                                            <b>+</b>
                                        </button>
                                        <input style="width: 20%;" type="number" name="add_value" min="1" value="" placeholder="" required>
                                    </form>
                                </td> --}}

                                {{-- <td class="text-wrap">{{ ($inventory->created_at) }}</td> --}}
                                {{-- <td class="text-wrap"><b><a target=”_blank” style="color: rgb(0, 0, 0)" href="{{ route('qrcode') }}">Link<a></b></td> --}}
                                <td class="text-center">
                                    <div>
                                        <form method="POST" action="{{ route('product.release-stock', ['id' => $inventory->id]) }}">
                                            @csrf
                                            <input style="width: 15%;" type="number" name="release_value" min="1" value="" placeholder="0" required>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-warning" style="padding: 5px 10px;"><i class="ri-share-forward-2-line"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button style="padding: 5px 10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="text-center dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('edit.inventory', $inventory->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                            <a href="{{ route('delete.inventory', $inventory->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
                                        </div>
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
