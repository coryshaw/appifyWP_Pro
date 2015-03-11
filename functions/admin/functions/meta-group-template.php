<div class="meta-group-title" id="<?php echo $this->config['group_id']; ?>"><?php echo $this->config['title']; ?></div>

<table class="widefat theme-setting-table">
	
	<thead>
		<tr>
			<th style="width:20px">No.</th>
			<?php foreach($this->config['table_header'] as $theader): ?>
			<th><?php echo $theader; ?></th>
			<?php endforeach; ?>
			<th style="width:50px"></th>
		</tr>
	</thead>
	
	<tbody>
			
		<?php $this->input_tool->generate_meta_list(); ?>
				
		<tr class="meta-add-row">
			<td colspan="100%">
				<div id="table_add_<?php echo $this->config['group_id']; ?>" class="table_add_record">
					
					<?php 
						$this->input_tool->config['group_id'] = '_' . $this->input_tool->config['group_id'];
						$this->input_tool->generate_meta_option();
						$this->input_tool->config['group_id'] = ltrim( $this->input_tool->config['group_id'], '_');
					?>
					
					<input type="submit" value="Add record & Save all settings" class="button-primary button-add" name="add_record_<?php echo $this->config['group_id']; ?>" />
					
				</div>
			</td>
		</tr>
	
	</tbody>
	
	<tfoot>
		<tr>
			<th colspan="100%">
				<input class="button meta-add-row-bt" type="button" value="New Record" />
				<input class="button meta-add-row-close-bt" type="button" value="Close" />
			</th>
		</tr>
	</tfoot>
	
</table>