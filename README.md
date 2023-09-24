# WooCommerce-EasyCheckout

You know how when you build a WooCommerce site the checkout always asks for billing information whether it's a physical product or a digital product and also when you turn off some fields using checkout plugins it turns it off for every type of checkout completely?

I built this plugin to handle that.


It detects the product type in the users cart;

• If it is ONLY digital products (virtual/downloadable) in the cart it turns off the billing fields and asks for only the name and email address

• If it is ONLY physical products it uses the original billing fields

• If it contains both types then it uses the original billing fields so the seller can have a shipping address to send the physical products