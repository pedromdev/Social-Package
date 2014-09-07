<form action="" method="post" style="width:400px">
	<table class="form-table">
		<tr>
			<th width="100"><label for="max_results">Nº de vídeos</label></th>
			<th>
				<input type="text" name="max_results" id="max_results" class="number-field"
					value="<?= $yt_options->max_results ?>" size="3" maxlength="3">
			</th>
		</tr>
		<tr>
			<th width="100"><label for="start_index">Índice inicial dos vídeos</label></th>
			<th>
				<input type="text" name="start_index" id="start_index" class="number-field"
					value="<?= $yt_options->start_index ?>" size="3" maxlength="3">
			</th>
		</tr>
		<tr>
			<th width="100"><label for="per_page">Vídeos por página (0 para não paginar)</label></th>
			<th>
				<input type="text" name="per_page" id="per_page" class="number-field"
					value="<?= $yt_options->per_page ?>" size="3" maxlength="3">
			</th>
		</tr>
		<tr>
			<th width="100"><input type="submit" class="button-primary" value="Salvar"></th>
		</tr>
	</table>
</form>