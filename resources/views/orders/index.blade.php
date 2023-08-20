<x-app-layout>


<div class="container">
    <h1>orders</h1>
    <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
           
                    
                    <th>deliveryStatus</th>
                    <th>vehicle</th>
                    <th>Customer</th>
                    <th>Product/Quantity</th>
                    <th>Product2/Quantity</th>

                    
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        
                        <td>{{ $order->deliveryStatus }}</td>
                        <td>{{ $order->vehicle }}</td>
                        <td>{{ $order->customer_id }}</td>
                        
                        <td>
    {{ $order->product1 ? $order->product1->name : 'N/A' }}
    &nbsp; / &nbsp;
    {{ $order->Product1_quantity }}</td>
<td>
    {{ $order->product2 ? $order->product2->name : 'N/A' }}
    &nbsp; / &nbsp;
    {{ $order->Product2_quantity }}
</td>

  

                        <td>

                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">
                        Edit

                            </a>
            

</br></br>

                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('orders.create') }}" class="btn btn-success">Create order</a>
</div>


</x-app-layout>

