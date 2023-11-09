function opentheDiv() {
    var selectedSport = document.getElementById("sportoption").value;
    // Hide all divs
  document.getElementById("badmintonFac").style.display = "none";
  document.getElementById("basketballDiv").style.display = "none";
  document.getElementById("futsalFac").style.display = "none";

    if (selectedSport === "badminton") {
      document.getElementById("badmintonFac").style.display = "block";
    } else if (selectedSport === "basketball") {
      document.getElementById("basketballDiv").style.display = "block";
    } else if (selectedSport === "futsal") {
      document.getElementById("futsalFac").style.display = "block";
    }
  }
//above js code is open toggle div 







