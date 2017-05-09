<?php
session_start();

		include 'dbFunctions.php';
		$connection = dbConnect();
		$searchResult = ($_POST['searchList']);
		$query = "SELECT tag_ID from tags where tag_Title like ".$searchResult.";";  // This process searches through the database for all
		$searchRow = [];	// entries that are like the input searched by the user 
		$ciNameRow = [];
		$result = mysqli_query( $connection , $query ); //then searches through the table tags for all tag_ids where the title is similar
		if($result){
			while($row = mysql_fetch_assoc($result)){ // this then goes through item_tags and finds the item names that have the 
				$searchRow[] = $row;             // same tag_id -
			}					// then it finds the entries of that code and prints it to the mainscreen.
			foreach( $searchRow as $row ){              
				$query = "SELECT i_Name FROM item_tags WHERE tag_ID = ".$searchRow[i].";";
				$itemsresult = mysqli_query($dbConnect, $query);
				while ($row = mysql_fetch_assoc($itemsresult)) {
					array_push($ciNameRow, $row["i_Name"]);
				}
			}
			$query = "SELECT * FROM items WHERE ";
			$count = 0;
			foreach( $ciNameRow as $iNames ){
				if( $count != 0 ){
					$query .= " OR ";
				}
				$query .= "i_Name = ".$iNames;
				$count++;
			}
			$query .= " LIMIT 20;";
			$searchResult = mysqli_query( $connection , $query );
		}else{
			$searchResult = 0;
		}

		echo '<form id="searchResult" action="index.php" method="POST">';
		echo '<input type="hidden" name="searchResult" value="'.$searchResult.'">';
		echo '</form>';
		echo '<script type="text/javascript">'.'document.getElementById( \'searchResult\' ).submit();'.'</script>';
?>
