@extends('layouts.app') <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
    <div class="container">
        <h2>Tambah Supplier Baru</h2>
        @if (Auth::user()->isAdmin())
            <form id="createSupplierForm" action="{{ route('admin.supplier.store') }}" method="post">
            @endauth
            @if (Auth::user()->isOwner())
                <form id="createSupplierForm" action="{{ route('owner.supplier.store') }}" method="post">
                @endauth
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Supplier</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Supplier</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>

                <button type="submit" class="btn btn-primary">Tambah Supplier</button>
            </form>
</div>
@endsection
