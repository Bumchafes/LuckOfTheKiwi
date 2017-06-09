<!--This form used to register a user-->
<html>
<head>
	<title>Lucky Kiwi Registration</title>
	<link rel = "stylesheet" href = "style.css">
</head>
	<h1><i>TheLuckyKiwi</i></h1>
<body>
<div>
	<form class="inputs" action='registrationProcess.php' method='post'>
	 <table>
	  <tr>
	   <td align="left">Username:</td> <td align="right"><input required type='text' name='userName'></td>
	  </tr>
	  <tr>
	   <td align="left">Password:</td> <td align="right"><input required type='password' name='password'></td>
	  </tr>
	  <tr>
	   <td align="left">Confirm Password:</td> <td align="right"><input required type='password' name='cfmpassword'></td>
	  </tr>
	  <tr>
	   <td align="left"><p>First Name:</td> <td align="right"><input required type='text' name='firstName'></td>
	  </tr>
	  <tr>
	   <td align="left">Last Name:</td> <td align="right"><input required type='text' name='lastName'></td>
	  </tr>
	  <tr>
	   <td align="left">Email:</td> <td align="right"><input required type='text' name='email'></td>
	  </tr>
	  
	  </table>
	<!--drop table for user to select month-'date of birth-->			
	<p>DOB: <select required name="DOBMonth">
		<option> - Month - </option>
		<option value="01">January</option>
		<option value="02">Febuary</option>
		<option value="03">March</option>
		<option value="04">April</option>
		<option value="05">May</option>
		<option value="06">June</option>
		<option value="07">July</option>
		<option value="08">August</option>
		<option value="09">September</option>
		<option value="10">October</option>
		<option value="11">November</option>
		<option value="12">December</option>
	</select>
	<!--drop table for user to select day-'date of birth'-->
	<select name="DOBDay">
		<option> - Day - </option>
		<option value="01">1</option>
		<option value="02">2</option>
		<option value="03">3</option>
		<option value="04">4</option>
		<option value="05">5</option>
		<option value="06">6</option>
		<option value="07">7</option>
		<option value="08">8</option>
		<option value="09">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
	</select>
	<!--drop table for user to select year - 'date of birth'-->
	<select name="DOBYear">
		<option> - Year - </option>
		<option value="1999">1999</option>
		<option value="1998">1998</option>
		<option value="1997">1997</option>
		<option value="1996">1996</option>
		<option value="1995">1995</option>
		<option value="1994">1994</option>
		<option value="1993">1993</option>
		<option value="1992">1992</option>
		<option value="1991">1991</option>
		<option value="1990">1990</option>
		<option value="1989">1989</option>
		<option value="1988">1988</option>
		<option value="1987">1987</option>
		<option value="1986">1986</option>
		<option value="1985">1985</option>
		<option value="1984">1984</option>
		<option value="1983">1983</option>
		<option value="1982">1982</option>
		<option value="1981">1981</option>
		<option value="1980">1980</option>
		<option value="1979">1979</option>
		<option value="1978">1978</option>
		<option value="1977">1977</option>
		<option value="1976">1976</option>
		<option value="1975">1975</option>
		<option value="1974">1974</option>
		<option value="1973">1973</option>
		<option value="1972">1972</option>
		<option value="1971">1971</option>
		<option value="1970">1970</option>
		<option value="1969">1969</option>
		<option value="1968">1968</option>
		<option value="1967">1967</option>
		<option value="1966">1966</option>
		<option value="1965">1965</option>
		<option value="1964">1964</option>
		<option value="1963">1963</option>
		<option value="1962">1962</option>
		<option value="1961">1961</option>
		<option value="1960">1960</option>
		<option value="1959">1959</option>
		<option value="1958">1958</option>
		<option value="1957">1957</option>
		<option value="1956">1956</option>
		<option value="1955">1955</option>
		<option value="1954">1954</option>
		<option value="1953">1953</option>
		<option value="1952">1952</option>
		<option value="1951">1951</option>
		<option value="1950">1950</option>
		<option value="1949">1949</option>
		<option value="1948">1948</option>
		<option value="1947">1947</option>
	</select>
	</p>
	<br>
	<p><input class = "button buttonHover" type='submit' value='Register'>
	<input class = "button buttonHover" type='reset' value='Reset'>
	</form>
	<p><a class = "button buttonHover" href="index.php">Return Home Page </a></p>
</div>
</body>
<html>
