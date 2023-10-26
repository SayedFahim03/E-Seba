<div class="w-75 mx-auto">
	
	<table class="table table-striped">
	  <thead>
	
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Name</th>
	      <th scope="col">Image</th>
	      <th scope="col">Time</th>
	      <th scope="col">Qualification</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
			$doc = $Doctors->allDoctor();
			if ($doc) {
				$i = 0;
			  	while($value = $doc->fetch_assoc()){
			  		$i++;
		?>
	    <tr>
	      <th scope="row"><?php echo $i; ?></th>
	      <td><?php echo $value['doc_name']; ?></td>
	      <td><?php echo $value['doc_image']; ?></td>
	      <td><?php echo $value['time']; ?></td>
	      <td><?php echo $value['doc_qualification']; ?></td>
	      <td><a href="?type=edit_doctors&id=<?php echo $value['doc_id']; ?>" class="btn btn-outline-primary">Edit</a> || <a href="?deletedoctor=<?php echo $value['doc_id']; ?>" class="btn btn-danger">Delete</a></td>
	    </tr>
	    <?php }} ?>
	  </tbody>
	</table>
</div>