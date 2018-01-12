//hartron junior programmer sample paper code
<?php

$con = mysql_connect('localhost','root','');
mysql_select_db('hartron');
if ($con){
	echo "successfully connected";
}
?>
<div style="margin-left: 50px;">
<h2>Enter Policy Detail</h2>
<form action="index.php" method="POST">
	<table>

	<tr>
		<td>Agent Name</td>
		<td>
			<select>
			<option>Select Agent</option>2
			<?php
			$list =  mysql_query("select * from agent_name");
			while ($name = mysql_fetch_array($list)) {
				# code...

			?>

				<option><?php echo $name['agent_name'] ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
		<tr>
			<td>AgentNo.</td>
			<td><input type="text" name="agentno"></td>
		</tr>
		<tr>
			<td>PolicyDate</td>
			<td><input type="text" name="policydate"></td>
		</tr>
		<tr>
			<td>CustomerName.</td>
			<td><input type="text" name="customername"></td>
		</tr>
		<tr>
			<td>PolicyAmount</td>
			<td><input type="text" name="policyamount"></td>
		</tr>
		<tr>
			<td>Commession</td>
			<td><input type="text" name="commession" disabled></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="save">
			</td>
		</tr>
	</table>


</form>

</div>

<?php
if(isset($_POST['save'])){

	$agentno = $_POST['agentno'];
	$policydate = $_POST['policydate'];
	$customername = $_POST['customername'];
	$policyamount = $_POST['policyamount'];
	if ($policyamount<10000){
		$commession = $policyamount*1.02-$policyamount;
	}
	if($policyamount>10000){
		$commession = $policyamount*1.025-$policyamount;
	}


	$query = "insert into policy_detail(agent_no,policydate,customername,policyamount,commision) values ('$agentno','$policydate','$customername','$policyamount','$commession')";
	if(mysql_query($query)){
		echo "Data successfully saved";
	}
	else{
		echo "failed to saved";
	}

}
?>
<h2>Report</h2>
<table border="2">
<tr>
<th>Agent</th>
<th>Policy Date</th>
<th>Policy Amount</th>
<th>Commession</th>
</tr>
<?php
$record = mysql_query("SELECT * FROM policy_detail");
while ($data = mysql_fetch_array($record)) {
	# code...
	?>
	<tr>
	<td><?php echo $data['agent_no']; ?></td>
	<td><?php echo $data['policydate']; ?></td>
	<td><?php echo $data['policyamount']; ?></td>
	<td><?php echo $data['commision']; ?></td>
</tr>
<?php } ?>
</table>