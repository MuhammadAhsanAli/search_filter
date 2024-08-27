@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="page-header">Customer Management</h1>

        <form action="{{ route('customers.search') }}" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" name="email" placeholder="Customer Email" value="{{ request('email') }}"
                       class="form-control" aria-label="Customer Email">
            </div>
            <div class="form-group">
                <input type="text" name="order_number" placeholder="Order Number" value="{{ request('order_number') }}"
                       class="form-control" aria-label="Order Number">
            </div>
            <div class="form-group">
                <input type="text" name="item_name" placeholder="Item Name" value="{{ request('item_name') }}"
                       class="form-control" aria-label="Item Name">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        @if($customers->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Orders</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->email }}</td>
                            <td>
                                @foreach($customer->orders as $order)
                                    <p>Order #{{ $order->order_number }}:
                                        @foreach($order->items as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $customers->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <p class="text-center text-muted">No customers found.</p>
        @endif
    </div>
@endsection
