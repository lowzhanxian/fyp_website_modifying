<header>
        <div class="adminNav">
            <ul>
                <li class="liTitleimg"><img src="images/title.png" class="titleimg" href="adminDashBoard.php"></li>
                <li><a href="adminDashBoard.php">DashBoard</a></li>
				<li><a href="admin_manageFacilities.php">Manage Facilities</a></li>
                <li><a href="admin_Equipment.php">Equipment</a></li>
                <li><a href="admin_Coach.php">Coach</a></li>


				
				<li><a href="admin_logout.php">Log Out</a></li>
                
            </ul>
        </div>
		<div class="realTime">
        	<div id="clock">

        	</div>
    	</div>

		<script>
			function realtime() {
				var now = new Date();
				var hour = now.getHours();
				var minute = now.getMinutes();

				hour = real_Time(hour);
				minute = real_Time(minute);

				document.getElementById('clock').innerHTML = hour + ":" + minute;
				setTimeout(realtime, 1000); // Update the time every 1 second
			}

			function real_Time(x) {
				var i = x;
				if (x < 10) {
					i = "0" + x;
				}
				return i;
			}
		</script>
    </header>