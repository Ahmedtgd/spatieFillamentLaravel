
<x-app-layout>

  
<div class="container">
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use the PUT method for updating -->

        <div class="form-group">
            <label for="deliveryStatus">Delivery Status:</label>
            <input type="text" id="deliveryStatus" name="deliveryStatus" class="form-control" value="{{ $order->deliveryStatus }}" required>
        </div>

        <div class="form-group">
            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" class="form-control" value="{{ $order->vehicle }}" required>
        </div>
        <!-- Other form fields -->

        <div class="form-group">
            <label for="customer_id">Customer ID:</label>
            <input type="number" id="customer_id" name="customer_id" class="form-control" value="{{ $order->customer_id }}" required>
        </div>

       <!-- Your form fields here -->

       <div class="form-group">
            <label>Product 1</label>
            <select name="Product_id" class="form-control">
                <option value="">--- No Value ----</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $order->product1->id ? 'selected' : '' }}>
                        {{ $product->name }} &nbsp; {{ $product->quantity }}
                    </option>
                @endforeach
            </select>
            <br>
            <input type="number" id="Product1_quantity" name="Product1_quantity" class="form-control" placeholder="Enter Quantity" value="{{ $order->product1_quantity }}">
        </div>
        
        <div class="form-group">
            <label>Product 2</label>
            <select name="Product2_id" class="form-control">
                <option value="">--- No Value ----</option>
                @foreach ($products2 as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $order->product2->id ? 'selected' : '' }}>
                        {{ $product->name }} &nbsp; {{ $product->quantity }}
                    </option>
                @endforeach
            </select>
            <br>
            <input type="number" id="Product2_quantity" name="Product2_quantity" class="form-control" placeholder="Enter Quantity" value="{{ $order->product2_quantity }}">
        </div>

        <!-- Other form fields -->

        <input type="hidden" name="product_details" id="product_details">

        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
</div>
</x-app-layout>

      

      
