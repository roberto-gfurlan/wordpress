/*Aplica desconto no frete direto no carrinho de compras - Woocommerce */

add_filter( 'woocommerce_package_rates', 'fa_woocommerce_package_rates', 10, 2 );
function fa_woocommerce_package_rates( $rates, $package ) {

  foreach ( $rates as $key => $rate ) {
    $cost = $rate->get_cost();

    // todos os métodos
    $rate->set_cost( $cost - 10 ); // desconto de 10 reais

    $rates[ $key ] = $rate;
  }

  return $rates;
}


/*Pula a página do carrinho - Woocommerce */

add_filter('add_to_cart_redirect', 'ql_skip_cart_page');
	function ql_skip_cart_page () {
	 global $woocommerce;
	 $redirect_checkout = $woocommerce->cart->get_checkout_url();
	 return $redirect_checkout;
	}
