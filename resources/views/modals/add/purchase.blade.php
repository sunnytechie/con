<!-- Modal HTML -->
<div style="z-index: 9999" id="newPurchase" class="modal delete-modal fade">
	<div class="modal-dialog modal-confirm">
        <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
			@csrf
		<div class="modal-content">
			<div class="modal-header flex-column">
				<h5>Purchase book</h5>
			</div>
			<div style="text-align: left" class="modal-body">



                    


			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">Store</button>
			</div>
		</div>
        </form>
	</div>
</div>
