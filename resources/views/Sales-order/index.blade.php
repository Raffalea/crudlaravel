@extends('master')

@section('title')
    <title>Sales Order</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sales Orders</h1>
            <a href="{{ route('Sales-order.create') }}" class="btn btn-primary ml-auto">Tambah Sales Order</a>
        </div>
        <div class="section-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No SO</th>
                        <th>Tanggal</th>
                        <th>Customer</th>
                        <th>Jumlah Item</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesOrders as $salesOrders)
                        <tr>
                            <td>{{ $salesOrders->number }}</td>
                            <td>{{ $salesOrders->date }}</td>
                            <td>{{ $salesOrders->customer }}</td>
                            <td>{{ $salesOrders->items->count() }}</td>
                            <td>
                                <a href="{{ route('Sales-order.show', $salesOrders->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('Sales-order.edit', $salesOrders->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('Sales-order.destroy', $salesOrders->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
