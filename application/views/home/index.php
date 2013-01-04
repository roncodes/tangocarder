<div class="alert alert-info" style="display:none;">
	<div class="message"></div>
</div>
<div class="well">
	<h1>Welcome to Tango-Carder!</h1>
	<p>Tango Carder is a simple web app that allows you to send multiple tango cards to friends or family each amount based on your total amount input</p>
</div>
<div class="row">
	<div class="span7">
		<form class="form-horizontal" id="sendCards" action="/tangocarder/home/send" method="post">
			<div class="control-group">
				<label class="control-label" for="spendingLimit">Spending Limit</label>
				<div class="controls">
					<div class="input-prepend input-append">
						<span class="add-on">$</span>
						<input class="span2" id="spendingLimit" name="spendingLimit" type="text">
						<span class="add-on">.00</span>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="emails">Recipents</label>
				<div class="controls">
					<div class="input-prepend">
						<a class="btn btn-primary" href="javascript:tango_carder.add_recipent($('#recipentAdd').val());">Add Recipent</a>
					</div>
					<input class="span2" id="recipentAdd" type="text" style="width:200px;">
				</div>
				<div class="controls">
					<div class="recipents" style="width:350px;height:130px;border:1px #ccc solid;margin-top:15px;overflow-x:hidden;overflow-y:auto;"></div>
					<input type="hidden" name="recipents" class="recipents-input" />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<a href="javascript:tango_carder.display_cards();" class="btn btn-primary">Continue</a>
				</div>
			</div>
		</form>
	</div>
	<div class="span5">
		<div id="end" class="well" style="display:none;"></div>
		<a href="javascript:tango_carder.complete();" style="display:none;" id="finish" class="btn btn-success btn-large">Finish & Send Cards!</a>
	</div>
</div>
