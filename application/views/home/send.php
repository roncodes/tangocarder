<?php if($success) { ?>
<div class="alert alert-block alert-success">
	<h1>Success!</h1>
	<p>You have successfully sent <?=count($recipents)?> tango card's, here are the card order references below: </p>
	<ul>
		<?php foreach($responses as $response) { ?>
		<li><?=$response->getReferenceOrderId()?> --> <?=$response->recipent?></li>
		<?php } ?>
	</ul>
	<a href="<?=base_url()?>" class="btn btn-medium">Continue</a>
</div>

<?php } else { ?>
<div class="alert alert-block alert-error">
	<h1>Something went wrong, try again</h1>
	<a href="<?=base_url()?>" class="btn btn-medium">Continue</a>
</div>
<?php } ?>