<?php
$plugins_required = Thim_Plugins_Manager::get_all_plugins();
?>

<div class="top">
	<h2>Install plugins required</h2>

	<form>
		<?php foreach ( $plugins_required as $plugin ): ?>
			<div class="form-group">
				<label>
					<input type="checkbox" name="<?php echo esc_attr( $plugin['slug'] ); ?>" <?php checked( true, $plugin['required'] ); ?> >
					<?php echo esc_html( $plugin['name'] ); ?>
					<span class="info">(<?php echo esc_html( $plugin['required'] ? 'Required' : 'Recommend' ); ?>)</span>
				</label>
			</div>
		<?php endforeach; ?>
	</form>
</div>

<div class="bottom">
	<button class="button button-primary tc-button tc-run-step" data-request="yes">Install and activate</button>
</div>
