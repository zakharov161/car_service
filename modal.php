	<div class="modal" id = "myModal" tabindex="-1" id="win-modal">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title">Заголовок модального окна</h5>
        			<button type="button" class="btn-close" data-dismiss="modal" aria-label="Закрыть"></button>
      			</div>
      			<div class="modal-body">
        			<p><?php echo $_SESSION['message']?></p>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      			</div>
    		</div>
  		</div>
	</div>
	<?php
  		if (isset($_SESSION['message'])) {
   			echo
			"<script type='text/javascript'>
    			$(window).on('load',function() {
        			$('#myModal').modal('show');
    			});
			</script>";
    		unset($_SESSION['message']);
		}
	?>