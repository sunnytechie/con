<!-- Modal HTML -->
<div style="z-index: 9999" id="deleteCategory" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
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
			<form method="POST" action="{{ route('categories.destroy', ) }}">
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-danger">Yes</button>
			</div>
		</form>
		</div>
	</div>
</div> 