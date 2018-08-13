<!-- Criteo Basket/Cart dataLayer -->
<script type="text/javascript">
    var dataLayer = dataLayer || [];
    dataLayer.push({
        event: "crto_basketpage",
        crto: {
            email: "{$soneriticsCriteoEmail}",
            products: [
                {foreach from=$cart.products item=product name=productLoop}{
                    id: "{$product.product_code}",
                    price: "{$product.price}",
                    quantity: "{$product.amount}"
                }{if !$smarty.foreach.productLoop.last},{/if}
                {/foreach}
            ]
        }
    });
</script>
<!-- END Criteo dataLayer -->
