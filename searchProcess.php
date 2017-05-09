<?php
session_start();

		include 'dbFunctions.php';
		$search = ($_POST["searchList"]);
		$query = "SELECT tag_ID from tags where tag_Title = '$search%';";
		$searchRow = [];
		$result = mysqli_query($dbConnect, $query);
		while($row = mysql_fetch_assoc($result)){
			$searchRow[] = $row;
		}
		for (int i = 0; i < count($searchRow);i++){
			$query = "SELECT i_Name, a_ID FROM item_tags WHERE tag_ID = ".$searchRow[i].";";
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