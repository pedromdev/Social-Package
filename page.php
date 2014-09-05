<form action="?page=social-package" method="post" accept-charset="utf-8">
	<table class="wp-list-table widefat fixed" style="width: 600px; padding: 20px 0;">
		<tr>
			<td width="100"><label for="youtube">YouTube</label></td>
			<td><input type="text" name="youtube" id="youtube" value="<?= $socials->youtube; ?>" style="width: 100%" placeholder="Insira o ID da conta"></td>
		</tr>
		<tr>
			<td><label for="facebook">Facebook</label></td>
			<td><input type="text" name="facebook" id="facebook" value="<?= $socials->facebook; ?>" style="width: 100%" placeholder="Insira o ID da conta"></td>
		</tr>
		<tr>
			<td><label for="flickr">Flickr</label></td>
			<td><input type="text" name="flickr" id="flickr" value="<?= $socials->flickr; ?>" style="width: 100%" placeholder="Insira o ID da conta"></td>
		</tr>
		<tr>
			<td><label for="soundcloud">Soundcloud</label></td>
			<td><input type="text" name="soundcloud" id="soundcloud" value="<?= $socials->soundcloud; ?>" style="width: 100%" placeholder="Insira o ID da conta"></td>
		</tr>
		<tr>
			<td><label for="twitter">Twitter</label></td>
			<td><input type="text" name="twitter" id="twitter" value="<?= $socials->twitter; ?>" style="width: 100%" placeholder="Insira o ID da conta"></td>
		</tr>
		<tr>
			<td><label for="vimeo">Vimeo</label></td>
			<td><input type="text" name="vimeo" id="vimeo" value="<?= $socials->vimeo; ?>" style="width: 100%" placeholder="Insira o ID da conta"></td>
		</tr>
		<tr><td><input type="submit" class="button-primary" value="Salvar"></td></tr>
	</table>
</form>