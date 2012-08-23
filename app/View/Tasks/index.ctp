<h1>Tasks</h1>
<?php if(empty($tasks)): ?>
There are no tasks in this list
<?php else: ?>
<table>
<tr>
<th>Title</th>
<th>Status</th>
<th>Created</th>
<th>Modified</th>
<th>Actions</th>
</tr>
<?php foreach($tasks as $task): ?>
<tr>
<td>
<?php echo $task['Task']['title'] ?>
</td>
<?php if($task['Task']['title']) echo "Done"; 
else echo "Pending"
?>
<td>
<?php echo $task['Task']['created'] ?>
</td>
<td>
<?php echo $task['Task']['modified'] ?>
</td>
<td>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>