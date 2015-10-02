<div id="footer">
	<div class="container">
		<p class="pull-left text-muted creditos"> &copy; <?php echo date('Y'); ?> Todos Los Derechos Reservados <a href="<?php echo URLBASE ?>"><?php echo TITULO ?></a> | Version <a><?php $sistema->VersionStockApp(); ?></a></p>
		<div class="pull-right">
			<ul class="nav nav-pills payments creditosFormasPago">
				<li><i class="fa fa-cc-visa"></i></li>
				<li><i class="fa fa-cc-mastercard"></i></li>
				<li><i class="fa fa-cc-amex"></i></li>
				<li><i class="fa fa-cc-paypal"></i></li>
			</ul> 
		</div>
	</div>
</div>
<?php $sistema->GoogleAnalytics(); ?>