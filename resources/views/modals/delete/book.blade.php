<!-- Modal HTML -->
<div style="z-index: 9999" id="myModal" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="#">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
                    <i class="fa fa-info" aria-hidden="true"></i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? <br> This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
        </form>
	</div>
</div> 