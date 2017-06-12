<?php
session_start();
		include 'dbFunctions.php';
		$connection = dbConnect();
	    $searchResult = $_GET["userI"]; 
	
	if (!$connection) 
	{
		echo "<p>Database connection failure</p>";
	} 
	else 
	{
		// Upon successful connection
		
		$query = "select * from items where i_Name like '$searchResult%'";
			
		// executes the query and store result into the result pointer
		$result = mysqli_query($connection, $query);
		
		// checks if the execuion was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
			// Display the retrieved records
			echo "<table border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">Name #</th>\n"
			     ."<th scope=\"col\">Description</th>\n"
				 ."<th scope=\"col\">Tickets left</th>\n"
				 ."<th scope=\"col\">Ticket Price</th>\n"
				 ."<th scope=\"col\">Purchase</th>\n"
				 ."</tr>\n";
			// retrieve current record pointed by the result pointer
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>",$row["i_Name"],"</td>";
				echo "<td>",$row["i_Desc"],"</td>";
				echo "<td>",$row["i_TicketRemain"],"</td>";
				echo "<td>",$row["i_TicketCost"],"</td>";
			    echo "<td>".
						'<form action = "ticketForm.php" method = "post">'.
							'<input type="hidden" name="ownerID" id="hiddenField" value="'.$row['a_ID'].'">'.
							'<input type="hidden" name="itemName" id="hiddenField" value="'.$row['i_Name'].'">'.
							'<input class = "button buttonHover" type="submit" value="Buy">'.
						'</form>'.
					'</td>';
				echo "</tr>";
			}
			echo "</table>";
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
		} // if successful query operation
		
		// close the database connection
		mysqli_close($connection);
	}
?>
