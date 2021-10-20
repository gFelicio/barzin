<a class="wrapper-product-card"
    href="{{ route('products.edit', $product->id) }}">
    <div class="product-card">
        <div class="product-card--name">
            {{ $product->name }}
        </div>

        <div class="product-card--description">
            {{ $product->description }}
        </div>

        <div class="product-card--price">
            R$ {{ $product->price }}
        </div>
    </div>
</a>
