<?php
	// Format:
	// cusion|and|pillow|and|blanket|or|couch
	// where the delimiter is a half-pipe '|'
	// 'and' and 'or' are used to enhance the query.
	// Expect Query:
	// SELECT * FROM items WHERE ( ( i_Name LIKE '%cusion%' AND ... ) AND ( i_Name ... ) ... ) OR ( ... );
	
	function wordSearch( $input ){
		
		if ( file_exists("C:\Users\Soulwrite\Google Drive\Lucky Kiwi\server\LuckyKiwi\dbFunctions.php") )
		{
			require 'C:\Users\Soulwrite\Google Drive\Lucky Kiwi\server\LuckyKiwi\dbFunctions.php';
		}
		else
		{
			return 0;//Returns 0 if can't find the dbFunctions file.
		}
		
		$words = explode( "|" , $input );//Splits the input into string array on delimiter '|'.
		
		$query = 'SELECT * FROM items WHERE (';
		
		$count = 0;
		
		foreach ( $words as $word )
		{
			
			if ( $count == 0 AND ($word == 'and' OR $word == 'or') )
			{
				return 0;//Returns 0 if the query starts with condition operator.
			}
			
			if ( $word == 'and' )
			{
				$query .= ' AND ';//Continues query ( ... and ... and ... ).
			}
			elseif ( $word == 'or' )
			{
				$query .= ' ) OR ( ';//Splits query : (...) or (...) or (...).			
			}
			else
			{
				$query .= ' ( i_Name LIKE \'%'.$word.'%\''
					.' AND i_Desc LIKE \'%'.$word.'%\' )';//Searches both name and description.
			}
			
			$count++;
			
		}
		
		$query .= ' );';
		
		$connection = dbConnect();//Connects to database.
		
		if ( $connection )
		{
			
			$result = mysqli_query( $connection , $query );//Runs the query.
			
			if ( !$result )
			{
				return 0;//Returns 0 if the query fails.
			}
			else
			{
				return $result;//Returns result.
			}
			
		}
		else
		{
			return 0;//Returns 0 if the connection fails.
		}
		
	}
?>
