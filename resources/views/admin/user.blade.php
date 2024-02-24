@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Users</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            {{-- Cert Index --}}
            <div class="card">
                <div class="card-body">
                    <table
                    {{-- id="datatable-buttons" --}}
                    class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            {{-- <th>IS ADMIN?</th> --}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-wrap">{{ ($user->name) }}</td>
                                <td class="text-wrap">{{ ($user->email) }}</td>
                                {{-- <td class="text-wrap">{{ ($user->is_admin) }}</td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Cert Index --}}

        </div>
    </div>

@endsection
