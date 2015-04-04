<div class="container">
<article class="col-sm-8">
<form>
	<div class="form-group">
		<input type="text" placeholder="Title" class="form-control" value="<?= $post['title'] ?>">
	</div>
	<div class="form-group">
		<textarea class="form-control" rows="20" placeholder="Content"><?= $post['content'] ?></textarea>
	</div>
	<div class="form-group">
		<textarea class="form-control" rows="5" placeholder="Excerpt"><?= $post['excerpt'] ?></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-md btn-primary">Update</button>
	</div>
</form>
</article>
<aside class="col-sm-4">
	
</aside>
</div>
