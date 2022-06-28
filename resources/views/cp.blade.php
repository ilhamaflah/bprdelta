	@if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-times"></span>
            </button>
        </div>
    @endif
	<div id="content">

		<div class="card">
			<div class="card-header">
				TITLE
			</div>
			<div class="card-body">
				<form method="post">
					@method('PUT')
					@csrf
                    <div class="mb-3">
                        <label for="f_title">Judul:</label>
                        <input type="text" class="form-control" name="title" id="f_title" value="">
                    </div>
                    <label for="f_content">Konten:</label>
                    <textarea class="form-control" rows="3" name="content" id="f_content"></textarea>
                    <button type="submit" class="btn btn-success mt-3"><i class="fa fa-save mr-2"></i>Perbarui</button>
                    <p class="float-right mt-3">Terakhir diperbarui oleh</p>
				</form>
			</div>
		</div>
	</div>
	<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace('f_content');
	</script>
