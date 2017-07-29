<div class="new-products-right-item grid @if($product['discount'])discount @endif">
    <a class=new-products-right-inner-item href="/product/{{ $product['slug'] }}">
        <div class="product-img-table">
            <div class="wrap-new-product-img bg-white-marmur"
                 style="background-image: url(/api/product-image/{{ $product['image'] }})"></div>
        </div>
        <div class=wrap-new-product-data>
            <div class="product-code">{{ $product['code'] }}</div>
            <div class="product-name">{{ $product['name'.$langSuf] }}</div>
            <div class="product-size">{{ $product['prices'] }}</div>
        </div>
    </a>
</div>