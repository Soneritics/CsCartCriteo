<!-- Criteo Sales dataLayer -->
<script type="text/javascript">
    var dataLayer = dataLayer || [];
    dataLayer.push({
        event: "crto_transactionpage",
        crto: {
            email: "{$soneriticsCriteoEmail}",
            transactionid: "{$order_info.order_id}",{* $order_info.email *}
            products: [
                {foreach from=$order_info.products item=product name=productLoop}{
                    id: "{$product.product_code}",
                    price: "{$product.price}",
                    quantity: "{$product.amount}"
                }{if !$smarty.foreach.productLoop.last},{/if}
                {/foreach}
            ]
        }
    });
</script>
<!-- END Criteo Sales dataLayer -->
