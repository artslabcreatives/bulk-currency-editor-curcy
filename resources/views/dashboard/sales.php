<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="bulk-currency-editor-curcy wrap">
	<h1><?php echo $plugin->Name ?>: Edit Product Sale Prices</h1>
	<div class="container-fluid">
		<form action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="card" style="width: 100%;">
						<div class="card-body">
    						<input type="hidden" name="_method" value="post">
							<table  class="table table-striped table-bordered dataTable" id="myTable" style="width:100%" >
								<thead>
									<tr>
										<th colspan="<?php echo count($currencies) + 4;?>">
											<input type="checkbox" name="select_all" class="select_all" />
											Select All
										</th>
									</tr>
									<tr>
										<th></th>
										<th>ID</th>
										<th>Product Name</th>
										<th>Categories</th>
										<?php foreach ($currencies as $curre) {?>
											<th><?php echo $curre;?></th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $key => $product) {?>
										<tr>
											<td>
												<input id="prod_<?php echo $product['ID']; ?>" class="product_checkbox no-sort" type="checkbox" name="selected_products[]" value="<?php echo $product['ID']; ?>">
											</td>
											<td><?php echo $product['ID']; ?></td>
											<td><a target="_blank" href="<?php echo 'post.php?post='.$product['ID'].'&action=edit'; ?>"><?php echo $product['title']; ?></a></td>
											<td><?php echo $product['categories']; ?></td>
											<?php foreach ($currencies as $curre) {?>
												<td><?php echo get_woocommerce_currency_symbol($curre); ?><?php echo ($product['meta_value'] != null && property_exists($product['meta_value'], $curre) == true) ? ($product['meta_value']->{$curre} != "" ? $product['meta_value']->{$curre} : "0") : "0"; ?></td>
											<?php } ?>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="card" style="width: 100%;">
						<div class="card-body">
							<?php foreach ($currencies as $curre) {?>
								<div class="form-group">
									<label ><?php echo $curre; ?> New Amount</label>
									<input type="number" class="form-control" name="bulk[<?php echo $curre; ?>]" placeholder="Enter <?php echo $curre; ?> Amount">
									<small class="form-text text-muted">Select which products you want to set a price change to</small>
								</div>
							<?php } ?>
							<input type="submit" name="submit" value="Save" class="btn btn-primary">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 100%;">
						<div class="card-body">
							<h3><?php echo $plugin->Name ?></h3>
							<h4>About Us</h4>
							<p>This is plugin requires you to use the <a href="https://wordpress.org/plugins/woo-multi-currency/" target="_blank">CURCY - Multi Currency for WooCommerce</a> plugin, it is a great plugin that allows you to define multiple currencies for Woo Commerece Products, but it does not have a feature that allows the users to edit multiple products (only the main currency is shown in the default bulk editor)</p>

							<h4>How to use</h4>
							<p>If you don't want to edit a currency that is listed here, then leave it blank. You must select the products above, only selected products will be updated with the values mentioned on the left</p>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>