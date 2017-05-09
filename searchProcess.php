<?php
session_start();

		include 'dbFunctions.php';
		$search = ($_POST["searchList"]);
		$query = "SELECT tag_ID from tags where tag_Title like '$search%';";  // This process searches through the database for all
		$searchRow = [];	// entries that are like the input searched by the user 
		$result = mysqli_query($dbConnect, $query); //then searches through the table tags for all tag_ids where the title is similar
		while($row = mysql_fetch_assoc($result)){ // this then goes through item_tags and finds the item names that have the 
			$searchRow[] = $row;             // same tag_id -
		}					// then it finds the entries of that code and prints it to the mainscreen.
		for (int i = 0; i < count($searchRow);i++){              
			$query = "SELECT i_Name, a_ID FROM item_tags WHERE tag_ID like ".$searchRow[i].";";
			echo '<tr>'.
					'<td class="left right" >'. 
						$searchRow['i_Name'].
					'</td><td class="right">'.
						$searchRow['i_Desc'].
					'</td><td class="right center">'.
						$searchRow['i_TicketCount'].
					'</td><td class="right center">$'.
						$searchRow['i_TicketCost'].
					'</td><td class="center right">'.
						'<form action = "ticketForm.php" method = "post">'.
						'<input type="hidden" name="ownerID" id="hiddenField" value="'.$row['a_ID'].'">'.
						'<input type="hidden" name="itemName" id="hiddenField" value="'.$row['i_Name'].'">'.
						'<input class = "button buttonHover" type="submit" value="Buy">'.
						'</form>'.
					'</td>'.
				'</tr>';
		}
?>
