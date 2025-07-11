@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">List Pengeluaran</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Waktu Pembelian</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->name }}</td>
                                        <td>{{ $expense->description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($expense->transaction_time)->formatLocalized('%d %B %Y') }}
                                        </td>
                                        <td>{{ 'Rp ' . number_format($expense->total, 0, ',', '.') }}</td>
                                        @if (Auth::user()->isOwner())
                                            <td>
                                                <a href="{{ route('owner.expense.edit', ['id' => $expense->id]) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <form action="{{ route('owner.expense.destroy', $expense['id']) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" id="delete"
                                                        name="delete">Delete</button>
                                                </form>
                                            </td>
                                        @else(Auth::user()->isAdmin())
                                            <td>
                                                <a href="{{ route('admin.expense.edit', ['id' => $expense->id]) }}"
                                                    class="btn btn-primary">Edit</a>



                                                <form action="{{ route('admin.expense.destroy', $expense['id']) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" id="delete"
                                                        name="delete">Delete</button>
                                                </form>

                                            </td>
                                        @endif

                                    </tr>
                                @endforeach

                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->name }}</td>
                                        <td>{{ $purchase->description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($purchase->transaction_time)->formatLocalized('%d %B %Y') }}
                                        </td>
                                        <td>{{ 'Rp ' . number_format($purchase->total, 0, ',', '.') }}</td>
                                        @if (Auth::user()->isOwner())
                                            <td>
                                                <a href="{{ route('owner.purchase.edit', ['id' => $purchase->id]) }}"
                                                    class="btn btn-primary">Edit</a>

                                                <form action="{{ route('owner.purchase.destroy', $purchase['id']) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" id="delete"
                                                        name="delete">Delete</button>
                                                </form>
                                            </td>
                                        @else(Auth::user()->isAdmin())
                                            <td>
                                                <a href="{{ route('admin.purchase.edit', ['id' => $purchase->id]) }}"
                                                    class="btn btn-primary">Edit</a>



                                                <form action="{{ route('admin.purchase.destroy', $purchase['id']) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" id="delete"
                                                        name="delete">Delete</button>
                                                </form>

                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
