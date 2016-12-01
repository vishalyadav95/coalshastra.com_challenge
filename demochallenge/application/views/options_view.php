<div id="container">
	<?php $sessionData = $this->session->all_userdata();
		echo '<div id="welcome-loggedin-user">Hi! <span>' . $sessionData['username'] . '</span></div>';
	?>
	<?php echo anchor('site/logout', 'Logout', array('id' => 'logout-link', 'class' => 'nav-link')); ?>
	
	<h3>Create: Message</h3>
	
	<div>
		<div class="f-left col-twothirds">			

			<?php $attributes = array('id' => 'form_create'); ?>
			<?php echo form_open('site/create', $attributes);?>

			<p>
				<label class="f-left col-third" for="title">Title:</label>
				<input required="required" class="f-left" type="text" name="title" id="title" />
			</p>
			<p>
				<label class="f-left col-third" for="content">Content:</label>
				<textarea class="f-left col-twothirds" required="required" class="f-left" type="textarea" rows="4" cols="50" name="content" id="content"></textarea>		
			</p> <br/>
			<p>
				<div class="f-left col-third">&nbsp;</div><br/><br/>
				<input type="submit" value="Submit" id="submit-create" />
			</p>
			<?php echo form_close(); ?>				
		</div>		
	</div>

	<div class="clear">&nbsp;</div>
	<a id="view-entries" class="nav-link">View Entries</a>
	<div id="entries" class="clear">
		<?php if(isset($records)) : foreach($records as $row) : ?>
		<div class="entry">
			<h3><?php echo $row->title; ?></h3>	
			<p class="clear"><?php echo $row->content; ?></p>	
			<small><?php echo anchor("site/delete/$row->id",'Delete', array('class' => 'confirmClick')); ?></small>
		</div>
		<?php endforeach; ?>
		<?php else : ?>	
			<h2>No records</h2>
		<?php endif;?>		
		<?php if(isset($records)) { 
			echo $this->pagination->create_links($records); 
			}
		?>
	</div>



	<br />

	<!--<h2>Delete</h2>
	<p>
		To sample the delete method, simply click on one of the headings listed above. A delete query will automatically run.
	</p>-->
</div>

	<script type="text/javascript">
		$('#view-entries').click(function() {
			  $('#entries').toggle();
			});
		$("#form_create").submit(function() {
			alert('Message has been submitted.');
		});
		$(".confirmClick").click( function() { 
		    if ($(this).attr('title')) {
		        var question = 'Are you sure you want to ' + $(this).attr('title').toLowerCase() + '?';
		    } else {
		        var question = 'Are you sure you want to do this action?';
		    }
		    if ( confirm( question ) ) {
		        [removed].href = this.src;
		    } else {
		        return false;
		    }
		}); 
	</script>

	<script type="text/javascript">
	  WebFontConfig = {
	    google: { families: ['Open+Sans::latin' ]}
	  };
	  (function() {
	    var wf = document.createElement('script');
	    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	    wf.type = 'text/javascript';
	    wf.async = 'true';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(wf, s);
	  })(); 
  </script>

  <script type="text/javascript">
   //var intRegex = /^*/;  
  	$(function() {
    if ( document.location.href.indexOf('/members_area/') > -1 ) {
        $('#view-entries').click();
    }
	});
  </script>

  <script type="text/javascript">
  	$(function() {
    if ( document.location.href.indexOf('/delete/') > -1 ) {
        window.open("<?php echo base_url(); ?>/index.php/site/members_area/", "_self");
    }
	});
  </script>
