<!-- Criteo Category / Listing dataLayer -->
<script type="text/javascript">
    var dataLayer = dataLayer || [];
    dataLayer.push({
        event: "crto_listingpage",
        crto: {
            email: "{$soneriticsCriteoEmail}",
            products: [{foreach from=$products item=product name=productLoop}"{$product.product_code}"{if !$smarty.foreach.productLoop.last},{/if}{/foreach}]
        }
    });
</script>
<!-- END Criteo Category / Listing dataLayer -->
