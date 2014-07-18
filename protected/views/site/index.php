<?php 	
		$this->pageTitle = 'ShortUrl';
		$this->pageDescription = 'ShortUrl';
		$this->pageKeywords = '';
?>
 
<div class="page-header">
      <h1>Make Url</h1>
 </div>
 
 <div class="row">
	<div class="col-lg-1">
		Full Url:
	</div>
  <div class="col-lg-8">
    <div class="input-group">
      <input type="text" class="form-control" id="full_url">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="submit"><span class="glyphicon glyphicon-link"></span> Create</button>
		<button class="btn btn-default" type="button" id="clear"><span class="glyphicon glyphicon-trash"></span> Clear</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<br/>
 <div class="row">
 <div class="col-lg-1">
		Short Url:
	</div>
	
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" name="short_url" id="short_url">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="copy" data-clipboard-text="" title="Click to copy me."> <span class="glyphicon glyphicon-floppy-save"></span> Copy</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
 

 <div class="page-header">
      <h1>Top 10 Links</h1>
 </div>
 <div class="row">
	<div class="col-md-12">
	  <table class="table table-striped">
		<thead>
		  <tr>
			<th>#</th>
			<th>Full URL</th>
			<th>Short URL</th>
			<th>Create Date</th>
			<th>Views</th>
		  </tr>
		</thead>
		<tbody>
		<? if($links)
			foreach($links as $k=>$v): ?>
		  <tr title="<?=CHtml::encode($v->url_long_url)?>">
			<td><?=($k+1)?></td>
			<td><a href="<?=CHtml::encode($v->url_long_url)?>" target="_blank">link</a></td>
			<td><a href="/<?=CHtml::encode($v->url_short_code)?>" target="_blank"><?=CHtml::encode($v->url_short_code)?></a></td>
			<td><?=date('Y-m-d [H:i]', strtotime($v->url_create_date))?></td>
			<td><?=($v->url_counter)?></td>
		  </tr>
		  <? endforeach; ?>
		</tbody>
	  </table>
	</div>
  </div>
 
	  
<script>

$(document).ready(function(){
	
	$('#clear').on('click', function(){
		$('#full_url').val('');
		$('#short_url').val('');
		$("#copy").attr("data-clipboard-text", '');
		$('#copy').data('clipboard-text', '');
	});

	$('#submit').on('click', function(){
		var full_url = '';
		full_url = $('#full_url').val();
		$('#short_url').val('');
		$("#copy").attr("data-clipboard-text", '');
		$('#copy').data('clipboard-text', '');
		
		$.ajax({
				url: '/site/getshorturl/',
				type: 'POST',
				data: {
					url: full_url
				},
				dataType: "JSON",
				success: function(json) {
					if(json.error == '') {
						$('#short_url').val(json.short_url);
						$("#copy").attr("data-clipboard-text", json.short_url);
						$('#copy').data('clipboard-text', json.short_url);
					} else alert(json.error);
                },
                error: function() {
					alert('Oops! Something went wrong!');
                }
			});
		
	});
	
		var client = new ZeroClipboard( document.getElementById("copy") );

		client.on( "ready", function( readyEvent ) {
		  // alert( "ZeroClipboard SWF is ready!" );

		  client.on( "aftercopy", function( event ) {
			// `this` === `client`
			// `event.target` === the element that was clicked
			//event.target.style.display = "none";
			alert("Copied text to clipboard: " + event.data["text/plain"] );
		  } );
		} );
	


});
</script>