<?php
/**
 * @package     RedSHOP.Frontend
 * @subpackage  mod_redshop_cart
 *
 * @copyright   Copyright (C) 2008 - 2016 redCOMPONENT.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

$redhelper     = redhelper::getInstance();
$app           = JFactory::getApplication();
$itemId        = (int) $redhelper->getCartItemid();

$getNewItemId = true;

if ($itemId != 0)
{
	$menu = $app->getMenu();
	$item = $menu->getItem($itemId);

	$getNewItemId = false;

	if (isset($item->id) === false)
	{
		$getNewItemId = true;
	}
}

if ($getNewItemId)
{
	$itemId = (int) $redhelper->getCategoryItemid();
}

$displayButton = JText::_('MOD_REDSHOP_CART_CHECKOUT');

if ($button_text != "")
{
	$displayButton = $button_text;
}

JFactory::getDocument()->addStyleDeclaration(
	'.mod_cart_checkout .btn-primary{background-color:' . Redshop::getConfig()->get('ADDTOCART_BACKGROUND') . ';}'
);
?>
<div class="mod_cart_main">
	<div class="mod_cart_total" id="mod_cart_total">
		<?php
		echo RedshopLayoutHelper::render(
				'cart.cart',
				array(
					'cartOutput'       => $output_view,
					'totalQuantity'    => $count,
					'cart'             => $cart,
					'showWithVat'      => $show_with_vat,
					'showShippingLine' => $show_shipping_line,
					'showWithDiscount' => $show_with_discount
				),
				'',
				array(
					'component' => 'com_redshop'
				)
			);
		?>
	</div>
    <div class="mod_cart_checkout" id="mod_cart_checkout_ajax">
		<?php if ($count || $show_empty_btn): ?>
        <a class="btn btn-primary" href="<?php echo JRoute::_("index.php?option=com_redshop&view=cart&Itemid=" . $itemId); ?>">
            <?php echo $displayButton;?>
		</a>
		<?php endif; ?>
    </div>
</div>
