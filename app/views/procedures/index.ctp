<!-- File: /app/views/posts/index.ctp -->

<h1>Procedures</h1>
<table>
	<?php foreach ($procedures as $procedure): ?>
		<tr>        
			<td><?php echo $procedure['Procedure']['name']; ?></td>       
		</tr>
	<?php endforeach; ?>
</table>