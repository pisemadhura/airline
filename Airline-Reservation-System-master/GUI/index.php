<?php require_once("includes/connection.php") ?>
<?php require_once("includes/header.php") ?>
	<form class="forms" id="fuc1" method="POST" action="index.php?form=1">
		<h2>Please Enter Departure and Arrival Airport Informations: (No check box selection will only display direct flights)</h2>
		<table class="form_table" id="dac">
			<tr>
				<td><h3>Departure Airport Code : </h3></td>
				<td><input class="acode" name="d_airport" id="d_airport" type="text" value="" /></td>
				<td><h3>Arrival Airport Code : </h3></td>
				<td><input class="acode" name="a_airport" id="a_airport" type="text" value=""/></td>
				<td><h3>Connecting Flights :</h3></td>
				<td><input class="cb" type="checkbox" name="one" id="one" value="1"/>&nbsp;1&nbsp;</td>
				<td><input class="cb" type="checkbox" name="two" id="two" value="2"/>&nbsp;2&nbsp;</td>
				<td><input class="fire" id="fire1" type="submit"/></td>
			</tr>
		</table>
	</form>
	<form class="forms" id="fuc2" method="POST" action="index.php?form=2">
		<h2>Please Enter Flight Number and Date:</h2>
		<table class="form_table">
			<tr>
				<td><h3>Flight Number : </h3></td>
				<td><input class="fnum" name="fno" id="fno" type="text" value="" /></td>
				<td><h3>Date : </h3></td>
				<td><input name="datepicker" type="text" id="datepicker"></td>
				<td><input class="fire" id="fire2" type="submit"/></td>
			</tr>
		</table>
	</form>
	<form class="forms" id="fuc3" method="POST" action="index.php?form=3">
		<h2>Please Enter Flight Number:</h2>
		<table class="form_table">
			<tr>
				<td><h3>Flight Number : </h3></td>
				<td><input class="fnum" name="fno1" id="fno1" type="text" value="" /></td>
				<td><input class="fire" id="fire3" type="submit"/></td>
			</tr>
		</table>
	</form>
	
	<form class="forms" id="fuc4" method="POST" action="index.php?form=4">
		<h3>Search : <select id="pm"><option value="def">select</option><option value="s1">Passengers by Flight</option><option value="s2">Flights by Passenger</option></select></h3>
		<table class="form_table">
			<tr>
				<td id="searchLabel"></td>
				<td id="inputHolder"></td>
				<td id="fdate"></td>
				<td id="dateHolder"></td>
				<td id="submitHolder"></td>
			</tr>
		</table>
	</form>
	<div class="container" id="result">

	<?php
		if(isset($_POST['d_airport']) && isset($_POST['a_airport']))
		{
			$dac = $_POST['d_airport'];
			$aac = $_POST['a_airport'];	
			$query = "select flight_number,weekdays, airline,d_airport_code, a_airport_code,d_time, a_time, duration from flight f where upper(f.d_airport_code)='".$dac."' and upper(f.a_airport_code)='".$aac."';";
			$result = mysqli_query($connection,$query);
			echo "<h3>Direct Flights :</h3>";
			if(mysqli_num_rows($result)>0)
			{
				echo "<table class=\"table table-bordered table-striped\">";
									echo "<thead>";
									echo "<tr>
												<th>Flight Number</th>
												<th>Airline</th>
												<th>From</th>
												<th>To</th>
												<th>Days of Operation</th>
												<th>Scheduled Departure Time</th>
												<th>Scheduled Arrival Time</th>
												<th>Journey Duration</th>
										</tr>";
									echo "</thead>";
									echo "<tbody>";
									while($row = mysqli_fetch_array($result))
									{
										//Display the results in different cells
										echo "<tr><td>".$row["flight_number"]."</td>";
										echo "<td>".$row["airline"]."</td>";
										echo "<td>".$row["d_airport_code"]."</td>";
										echo "<td>".$row["a_airport_code"]."</td>";
										echo "<td>".$row["weekdays"]."</td>";
										echo "<td>".$row["d_time"]."</td>";
										echo "<td>".$row["a_time"]."</td>";
										echo "<td>".$row["duration"]."</td></tr>";
									}
									//Table closing tag
									echo "</tbody>";
									echo "</table>";
			}
			else
			{
				echo"<div>No direct flights Found.</div>";
			}
			if(isset($_POST['one']))
			{
				echo "<br><br><br><h3>Flights with 1 connecting airport:</h3>";
				$query = "Select DISTINCT f1.Flight_number as FirstFlightNumber, f1.airline as FirstAirline, f1.d_airport_code as Origin,f1.a_airport_code as IntermediatePoint1, f1.d_time as FirstFlightDepartureTime, f1.a_time as FirstFlightArrivalTime, f1.duration as FirstFlightDuration,timediff(f2.d_time,f1.a_time) AS Layover,f2.Flight_number as SecondFlightNumber, f2.airline as SecondAirline, f1.a_airport_code as IntermediatePoint, f2.a_airport_code as Destination, f2.d_time as SecondFlightDepartureTime, f2.a_time as SecondFlightArrivalTime, f2.duration as SecondFlightDuration 
							from FLIGHT as f1 join FLIGHT as f2 on(f1.a_airport_code=f2.d_airport_code and timediff(f2.d_time,f1.a_time)>'01:00:00')
							where f1.d_airport_code='".$dac."' AND f2.a_airport_code='".$aac."'
							AND ((f1.Weekdays like '%Mon%' and f2.Weekdays like '%Mon%') 
							or (f1.Weekdays like '%Tue%' and f2.Weekdays like '%Tue%')  
							or (f1.Weekdays like '%Wed%' and f2.Weekdays like '%Wed%')  
							or (f1.Weekdays like '%Thu%' and f2.Weekdays like '%Thu%') 
							or (f1.Weekdays like '%Fri%' and f2.Weekdays like '%Fri%') 
							or (f1.Weekdays like '%Sat%' and f2.Weekdays like '%Sat%')
							or (f1.Weekdays like '%Sun%' and f2.Weekdays like '%Sun%'));";				
				$result = mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0)
				{
					echo "<table class=\"table table-bordered table-striped\">";
									echo "<thead>";
									echo "<tr>
												<th>First Flight Number</th>
												<th>First Airline</th>
												<th>Origin</th>
												<th>Intermediate Point</th>
												<th>First Flight Scheduled Departure Time</th>
												<th>First Flight Scheduled Arrival Time</th>
												<th>First Flight Journey Duration</th>
												<th>Layover</th>
												<th>Second Flight Number</th>
												<th>Second Airline</th>
												<th>Intermediate Point</th>
												<th>Destination</th>
												<th>Second Flight Scheduled Departure Time</th>
												<th>Second Flight Scheduled Arrival Time</th>
												<th>Second Flight Journey Duration</th>
										</tr>";
									echo "</thead>";
									echo "<tbody>";
									while($row = mysqli_fetch_array($result))
									{
										//Display the results in different cells
										echo "<tr><td>".$row["FirstFlightNumber"]."</td>";
										echo "<td>".$row["FirstAirline"]."</td>";
										echo "<td>".$row["Origin"]."</td>";
										echo "<td>".$row["IntermediatePoint"]."</td>";
										echo "<td>".$row["FirstFlightDepartureTime"]."</td>";
										echo "<td>".$row["FirstFlightArrivalTime"]."</td>";
										echo "<td>".$row["FirstFlightDuration"]."</td>";
										echo "<td>".$row["Layover"]."</td>";
										echo "<td>".$row["SecondFlightNumber"]."</td>";
										echo "<td>".$row["SecondAirline"]."</td>";
										echo "<td>".$row["IntermediatePoint"]."</td>";
										echo "<td>".$row["Destination"]."</td>";
										echo "<td>".$row["SecondFlightDepartureTime"]."</td>";
										echo "<td>".$row["SecondFlightArrivalTime"]."</td>";
										echo "<td>".$row["SecondFlightDuration"]."</td></tr>";
									}
									//Table closing tag
									echo "</tbody>";
									echo "</table>";
				}
				else
				{
					echo"<div>No flights found with 1 connecting airport.</div>";
				}
			}
			if(isset($_POST['two']))
			{
				echo "<br><br><br><h3>Flights with 2 connecting airports:</h3>";
				$query = "Select DISTINCT f1.Flight_number as FirstFlightNumber, f1.airline as FirstAirline, f1.d_airport_code as Origin,f1.a_airport_code as IntermediatePoint1, f1.d_time as FirstFlightDepartureTime, f1.a_time as FirstFlightArrivalTime, f1.duration as FirstFlightDuration,timediff(f2.d_time,f1.a_time) AS FirstLayover,f2.Flight_number as SecondFlightNumber, f2.airline as SecondAirline, f1.a_airport_code as IntermediatePoint1, f2.a_airport_code as IntermediatePoint2, f2.d_time as SecondFlightDepartureTime, f2.a_time as SecondFlightArrivalTime, f2.duration as SecondFlightDuration, f3.Flight_number as ThirdFlightNumber, f3.airline as ThirdAirline, f2.a_airport_code as IntermediatePoint2,f3.a_airport_code as Destination, f3.d_time as ThirdFlightDepartureTime, f3.a_time as ThirdFlightArrivalTime, f3.duration as ThirdFlightDuration,timediff(f3.d_time,f2.a_time) AS SecondLayover 
							from FLIGHT as f1 join FLIGHT as f2 join FLIGHT as f3 on(f1.a_airport_code=f2.d_airport_code and timediff(f2.d_time,f1.a_time)>'01:00:00' and f2.a_airport_code=f3.d_airport_code and timediff(f3.d_time,f2.a_time)>'01:00:00')
							where f1.d_airport_code='".$dac."' AND f3.a_airport_code='".$aac."'
							AND ((f1.Weekdays like '%Mon%' and f2.Weekdays like '%Mon%' and f3.Weekdays like '%Mon%') 
							or (f1.Weekdays like '%Tue%' and f2.Weekdays like '%Tue%' and f3.Weekdays like '%Tue%')  
							or (f1.Weekdays like '%Wed%' and f2.Weekdays like '%Wed%' and f3.Weekdays like '%Wed%')  
							or (f1.Weekdays like '%Thu%' and f2.Weekdays like '%Thu%' and f3.Weekdays like '%Thu%') 
							or (f1.Weekdays like '%Fri%' and f2.Weekdays like '%Fri%' and f3.Weekdays like '%Fri%') 
							or (f1.Weekdays like '%Sat%' and f2.Weekdays like '%Sat%' and f3.Weekdays like '%Sat%')
							or (f1.Weekdays like '%Sun%' and f2.Weekdays like '%Sun%' and f3.Weekdays like '%Sun%'));";
				$result = mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0)
				{
					echo "<table class=\"table table-bordered table-striped\">";
									echo "<thead>";
									echo "<tr>
												<th>First Flight Number</th>
												<th>First Airline</th>
												<th>Origin</th>
												<th>Intermediate Point1</th>
												<th>First Flight Scheduled Departure Time</th>
												<th>First Flight Scheduled Arrival Time</th>
												<th>First Flight Journey Duration</th>
												<th>First Layover</th>
												<th>Second Flight Number</th>
												<th>Second Airline</th>
												<th>Intermediate Point1</th>
												<th>Intermediate Point2</th>
												<th>Second Flight Scheduled Departure Time</th>
												<th>Second Flight Scheduled Arrival Time</th>
												<th>Second Flight Journey Duration</th>
												<th>Second Layover</th>
												<th>Third Flight Number</th>
												<th>Third Airline</th>
												<th>Intermediate Point2</th>
												<th>Destination</th>
												<th>Third Flight Scheduled Departure Time</th>
												<th>Third Flight Scheduled Arrival Time</th>
												<th>Third Flight Journey Duration</th>
										</tr>";
									echo "</thead>";
									echo "<tbody>";
									while($row = mysqli_fetch_array($result))
									{
										//Display the results in different cells
										echo "<tr><td>".$row["FirstFlightNumber"]."</td>";
										echo "<td>".$row["FirstAirline"]."</td>";
										echo "<td>".$row["Origin"]."</td>";
										echo "<td>".$row["IntermediatePoint1"]."</td>";
										echo "<td>".$row["FirstFlightDepartureTime"]."</td>";
										echo "<td>".$row["FirstFlightArrivalTime"]."</td>";
										echo "<td>".$row["FirstFlightDuration"]."</td>";
										echo "<td>".$row["FirstLayover"]."</td>";
										echo "<td>".$row["SecondFlightNumber"]."</td>";
										echo "<td>".$row["SecondAirline"]."</td>";
										echo "<td>".$row["IntermediatePoint1"]."</td>";
										echo "<td>".$row["IntermediatePoint2"]."</td>";
										echo "<td>".$row["SecondFlightDepartureTime"]."</td>";
										echo "<td>".$row["SecondFlightArrivalTime"]."</td>";
										echo "<td>".$row["SecondFlightDuration"]."</td>";
										echo "<td>".$row["SecondLayover"]."</td>";
										echo "<td>".$row["ThirdFlightNumber"]."</td>";
										echo "<td>".$row["ThirdAirline"]."</td>";
										echo "<td>".$row["IntermediatePoint2"]."</td>";
										echo "<td>".$row["Destination"]."</td>";
										echo "<td>".$row["ThirdFlightDepartureTime"]."</td>";
										echo "<td>".$row["ThirdFlightArrivalTime"]."</td>";
										echo "<td>".$row["ThirdFlightDuration"]."</td></tr>";
									}
									//Table closing tag
									echo "</tbody>";
									echo "</table>";
				}
				else
				{
					echo"<div>No connecting flights found with 2 connecting airports.</div>";
				}
			}
		}
		else if(isset($_POST['fno']) && isset($_POST['datepicker']))
		{
			
				$fno = $_POST['fno'];
				$datepicker = $_POST['datepicker'];
				$token = explode('/', $datepicker);
				$date = array($token[2],$token[0],$token[1]);
				$datepicker = implode("-", $date);
				$query = "select flight_number,flight_date,(total_seats-seats_occupied) as seats_available from flight_reserved_seats WHERE flight_number = '".$fno."' AND flight_date = '".$datepicker."';";
				$result = mysqli_query($connection,$query);
				if(mysqli_num_rows($result)>0)
				{
					echo "<table class=\"table table-bordered table-striped\">";
										echo "<thead>";
										echo "<tr>
													<th>Flight Number</th>
													<th>Flight Date</th>
													<th>Number of Available Seats</th>
											  </tr>";
										echo "</thead>";
										echo "<tbody>";
										while($row = mysqli_fetch_array($result))
										{
											//Display the results in different cells
											echo "<tr>
														<td>".$row["flight_number"]."</td>
														<td>".$row["flight_date"]."</td>
														<td>".$row["seats_available"]."</td>
												</tr>";
										}
										//Table closing tag
										echo "</tbody>";
										echo "</table>";
				}
				else
				{
					echo "<div>Flight with Number '".$fno."' is not available on this date.</div>";
				}
		}
		else if(isset($_POST['fno1']))
		{
			$fno=$_POST['fno1'];
			$query = "SELECT flight_number,fare_code, amount, restrictions FROM FARE WHERE flight_number = '".$fno."';";
			$result = mysqli_query($connection,$query);
			if(mysqli_num_rows($result)>0)
			{
				echo "<table class=\"table table-bordered table-striped\">";
					echo "<thead>";
						echo "<tr>
									<th>Flight Number</th>
									<th>Fare Code</th>
									<th>Amount</th>
									<th>Restrictions</th>
								</tr>";
						echo "</thead>";
						echo "<tbody>";
						while($row = mysqli_fetch_array($result))
						{
							//Display the results in different cells
							echo "<tr>
									<td>".$row["flight_number"]."</td>
									<td>".$row["fare_code"]."</td>
									<td>$".$row["amount"]."</td>
									<td>".$row["restrictions"]."</td>
								</tr>";
							
						}
						//Table closing tag
					echo "</tbody>";
				echo "</table>";
			}
			else
			{
				echo "<div>Please check for the valid flight number.</div>";
			}
		}
		else if((isset($_POST['fno2']) && isset($_POST['datepicker1'])))
		{
			$fno=$_POST['fno2'];
			$datepicker=$_POST['datepicker1'];
			$token = explode('/', $datepicker);
			$date = array($token[2],$token[0],$token[1]);
			$datepicker = implode("-", $date);
			$query = "select s.flight_number, s.resv_date, s.seat_no, s.customer_name, s.customer_phone, f.airline, f.d_airport_code, fi.d_time, f.a_airport_code, fi.a_time from seat_reservation s join flight f on(f.flight_number=s.flight_number) join flight_instance fi on(f.flight_number=fi.flight_number and fi.flight_date=s.resv_date) where s.flight_number='".$fno."' and s.resv_date='".$datepicker."';";
			$result = mysqli_query($connection,$query);
			if(mysqli_num_rows($result)>0)
			{
				echo "<table class=\"table table-bordered table-striped\">";
								echo "<thead>";
								echo "<tr>
											<th>Flight Number</th>
											<th>Flight Date</th>
											<th>Seat Number</th>
											<th>Passenger Name</th>
											<th>Passenger Phone Number</th>
											<th>Airline</th>
											<th>Departure Airport Code</th>
											<th>Departure Time</th>
											<th>Arrival Airport Code</th>
											<th>Arrival Time</th>
										</tr>";
								echo "</thead>";
								echo "<tbody>";
								while($row = mysqli_fetch_array($result))
								{
									//Display the results in different cells
									echo "<tr>
												<td>".$row["flight_number"]."</td>
												<td>".$row["resv_date"]."</td>
												<td>".$row["seat_no"]."</td>
												<td>".$row["customer_name"]."</td>
												<td>".$row["customer_phone"]."</td>
												<td>".$row["airline"]."</td>
												<td>".$row["d_airport_code"]."</td>
												<td>".$row["d_time"]."</td>
												<td>".$row["a_airport_code"]."</td>
												<td>".$row["a_time"]."</td>
										</tr>";
								}
								//Table closing tag
								echo "</tbody>";
								echo "</table>";
			}
			else
			{
				echo "<div>Please check for the valid flight number or flight is not available on this date.</div>";
			}
		}
		else if(isset($_POST['pname']))
		{
			$pname=$_POST['pname'];
			$query = "select s.flight_number, s.resv_date, s.seat_no, s.customer_name, s.customer_phone, f.airline, f.d_airport_code, fi.d_time, f.a_airport_code, fi.a_time from seat_reservation s join flight f on(f.flight_number=s.flight_number) join flight_instance fi on(f.flight_number=fi.flight_number and fi.flight_date=s.resv_date) where upper(s.customer_name)like'%".$pname."%' or lower(s.customer_name)like'%".$pname."%';";
			$result = mysqli_query($connection,$query);
			if(mysqli_num_rows($result)>0)
			{
				echo "<table class=\"table table-bordered table-striped\">";
								echo "<thead>";
								echo "<tr>
											<th>Flight Number</th>
											<th>Flight Date</th>
											<th>Seat Number</th>
											<th>Passenger Name</th>
											<th>Passenger Phone Number</th>
											<th>Airline</th>
											<th>Departure Airport Code</th>
											<th>Departure Time</th>
											<th>Arrival Airport Code</th>
											<th>Arrival Time</th>
										</tr>";
								echo "</thead>";
								echo "<tbody>";
								while($row = mysqli_fetch_array($result))
								{
									//Display the results in different cells
									echo "<tr>
												<td>".$row["flight_number"]."</td>
												<td>".$row["resv_date"]."</td>
												<td>".$row["seat_no"]."</td>
												<td>".$row["customer_name"]."</td>
												<td>".$row["customer_phone"]."</td>
												<td>".$row["airline"]."</td>
												<td>".$row["d_airport_code"]."</td>
												<td>".$row["d_time"]."</td>
												<td>".$row["a_airport_code"]."</td>
												<td>".$row["a_time"]."</td>
										</tr>";
								}
								//Table closing tag
								echo "</tbody>";
								echo "</table>";
			}
			else
			{
				echo "<div>No passenger found.</div>";
			}
		}
		
	?>
</div>
<?php require_once("includes/footer.php") ?>