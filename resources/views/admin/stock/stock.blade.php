@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Stocks</h4>
                <a href="{{ route('add.stock') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">ADD</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ITEM</th>
                            <th>BRAND</th>
                            <th>SERIAL NUMBER</th>
                            {{-- <th>DATE ADDED</th> --}}
                            {{-- <th class="text-center">QR</th> --}}
                            <th class="text-center">RELEASE</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($stocks as $stock)
                            <tr>
                                <td class="text-wrap"><b>{{ ($stock->item->name) }}</b></td>
                                <td class="text-wrap">{{ ($stock->brand->name) }}</td>
                                <td class="text-wrap"><b>{{ ($stock->serial_key) }}</b></td>
                                {{-- <td class="text-wrap">{{ ($inventory->created_at) }}</td> --}}
                                {{-- <td class="text-wrap"><b><a target=”_blank” style="color: rgb(0, 0, 0)" href="{{ route('qrcode') }}">Link<a></b></td> --}}
                                <td class="text-center">
                                    <div>
                                        {{-- <a href="{{ route('edit.stock', $stock->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a> --}}
                                        <a href="{{ route('release.stock', $stock->id) }}" class="btn btn-primary waves-effect waves-light btn-warning" style="padding: 5px 10px;"><i class="ri-share-forward-2-line"></i></a>
                                        <a href="{{ route('delete.stock', $stock->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" onclick="confirmDelete(event)" style="padding: 5px 10px;"><i class="ri-delete-bin-2-fill"></i></a>
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
