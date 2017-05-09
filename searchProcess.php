<?php
session_start();

		include 'dbFunctions.php';
		$searchResult = ($_POST["searchList"]);
		$query = "SELECT tag_ID from tags where tag_Title like '$search%';";  // This process searches through the database for all
		$searchRow = [];	// entries that are like the input searched by the user 
		$ciNameRow = [];
		$result = mysqli_query($dbConnect, $query); //then searches through the table tags for all tag_ids where the title is similar
		while($row = mysql_fetch_assoc($result)){ // this then goes through item_tags and finds the item names that have the 
			$searchRow[] = $row;             // same tag_id -
		}					// then it finds the entries of that code and prints it to the mainscreen.
		for (int i = 0; i < count($searchRow);i++){              
			$query = "SELECT i_Name, a_ID FROM item_tags WHERE tag_ID = ".$searchRow[i].";";
			$itemsresult = mysqli_query($dbConnect, $query);
			while ($row = mysql_fetch_assoc($itemsresult)) {
				array_push($ciNameRow, $row["i_Name"]);
			}
		}
?>
