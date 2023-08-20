<x-app-layout>

<div class="container">
    <h1>Create order</h1>
    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="deliveryStatus">Delivery Status:</label>
            <input type="text" id="deliveryStatus" name="deliveryStatus" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="vehicle">Vehicle:</label>
            <input type="text" id="vehicle" name="vehicle" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deliveryStatus">Delivery Status:</label>
            <input type="text" id="deliveryStatus" name="deliveryStatus" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="customer_id">Customer ID:</label>
            <input type="number" id="customer_id" name="customer_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label> Product 1 </label> 
            <select name="Product_id" class="form-control">
                <option value="">--- No Value ----</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name }} &nbsp; {{$product->quantity }}</option>
                @endforeach
            </select>
            <br>
            <input type="number" id="Product1_quantity" name="Product1_quantity" class="form-control" placeholder="Enter Quantity">
        </div>

        <div id="productFields2" style="display: none;">
            <div class="form-group">
                <label> Product 2 </label> 
                <select name="Product2_id" class="form-control">
                    <option value="">--- No Value ----</option>
                    @foreach ($products2 as $product)
                        <option value="{{$product->id}}">{{$product->name }} &nbsp; {{$product->quantity }}</option>
                    @endforeach
                </select>
                <br>
                <input type="number" id="Product2_quantity" name="Product2_quantity" class="form-control" placeholder="Enter Quantity">
            </div>
        </div>

        <div id="toggleButtonContainer">
            <button type="button" id="toggleProductButton" class="btn btn-secondary">Add product</button>
        </div>

        <input type="hidden" name="product_details" id="product_details">

        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const productFields2 = document.getElementById('productFields2');
    const toggleProductButton = document.getElementById('toggleProductButton');
    const toggleButtonContainer = document.getElementById('toggleButtonContainer');
    
    let showProduct2 = false;

    toggleProductButton.addEventListener('click', function() {
        if (!showProduct2) {
            productFields2.style.display = 'block';
            toggleProductButton.textContent = 'Show Product 1';
            showProduct2 = true;
        } else {
            productFields2.style.display = 'none';
            toggleProductButton.textContent = 'Show Product 2';
            showProduct2 = false;
        }
    });
});
</script>

</x-app-layout>
