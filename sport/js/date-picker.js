document.addEventListener("DOMContentLoaded", function(event) {
    AddDatePickers();
});

function AddDatePickers() {
	
    window.Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    window.MonthsShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var DatePickers = document.getElementsByClassName('date-picker');

    for (i = 0; i < DatePickers.length; i++) {

        DatePickers[i].addEventListener('click', function (event) {

            AddCalendarDays((new Date()).getFullYear(), (new Date()).getMonth(), event.currentTarget);

        })

    }

}

function AddCalendarDays(Year, Month, Object) {
    if (Object) { window.DateObject = Object }

    if (!window.DatePickerHolder) {
        window.DatePickerHolder = document.createElement('div');
        window.DatePickerHolder.className = "date-picker-holder";
        window.DatePickerTable = document.createElement('table');
        window.DatePickerTable.className = "date-picker-table";
        document.body.appendChild(window.DatePickerHolder);
        document.body.appendChild(window.DatePickerTable);
    } else {
        window.DatePickerHolder.style.display = 'block';
        window.DatePickerTable.style.display = 'table';
        window.DatePickerTable.innerHTML = '';
    }

    if (Month < 0) {
        Year = Year - 1;
        Month = 11;
    }

    if (Month > 11) {
        Year = Year + 1;
        Month = 0;
    }

    window.Month = Month;
    window.Year = Year;

    var firstDay = new Date(window.Year, window.Month, 1);
    var lastDay = new Date(window.Year, window.Month + 1, 0);

    var DayOffset = firstDay.getDay();
    var Day = 1;
    var MaxDay = lastDay.getDate();
    var Done = false;

    var HeaderRow = "<table><tr><td onclick='AddCalendarDays(window.Year, window.Month - 1);'>❮</td><td onclick='AddCalendarMonths(window.Year);'>" + window.Months[window.Month] + " " + window.Year.toString() + "</td><td onclick='AddCalendarDays(window.Year, window.Month + 1);' >❯</td></tr></table>";

    var MainContent = "<table><tr><td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td></tr>";

    for (r = 0; r < 6; r++) {
        MainContent += "<tr>";
        for (c = 0; c < 7; c++) {
            MainContent += "<td onclick='SetDate(this);'";
            MainContent += ">" + Day.toString();
            MainContent += "</td>";
            DayOffset = DayOffset - 1;
            if (DayOffset < 0) {
                DayOffset = 6;
            }
            Day = Day + 1;
        }
        MainContent += "</tr>";
    }

    MainContent += "</table>";

    window.DatePickerTable.innerHTML = "<tr><td>" + HeaderRow + "</td></tr><tr><td>" + MainContent + "</td></tr>";
}


function AddCalendarDays(Year, Month, Object) {
    if (Object) { window.DateObject = Object }

    if (!window.DatePickerHolder) {
        window.DatePickerHolder = document.createElement('div');
        window.DatePickerHolder.className = "date-picker-holder";
        window.DatePickerTable = document.createElement('table');
        window.DatePickerTable.className = "date-picker-table";
        document.body.appendChild(window.DatePickerHolder);
        document.body.appendChild(window.DatePickerTable);
    } else {
        window.DatePickerHolder.style.display = 'block';
        window.DatePickerTable.style.display = 'table';
        window.DatePickerTable.innerHTML = '';
    }

    if (Month < 0) {
        Year = Year - 1;
        Month = 11;
    }

    if (Month > 11) {
        Year = Year + 1;
        Month = 0;
    }

    window.Month = Month;
    window.Year = Year;

    var today = new Date();
    var oneWeekLater = new Date();
    oneWeekLater.setDate(today.getDate() + 6); // Allow dates within one week

    var firstDay = new Date(window.Year, window.Month, 1);
    var lastDay = new Date(window.Year, window.Month + 1, 0);

    var DayOffset = firstDay.getDay();
    var Day = 1;
    var MaxDay = lastDay.getDate();
    var Done = false;

    var HeaderRow = "<table><tr><td onclick='AddCalendarDays(window.Year, window.Month - 1);'>❮</td><td onclick='AddCalendarMonths(window.Year);'>" + window.Months[window.Month] + " " + window.Year.toString() + "</td><td onclick='AddCalendarDays(window.Year, window.Month + 1);' >❯</td></tr></table>";

    var MainContent = "<table><tr><td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td></tr>";

    for (r = 0; r < 6; r++) {
        MainContent += "<tr>";
        for (c = 0; c < 7; c++) {
            MainContent += "<td onclick='SetDate(this);'";
            if (DayOffset > 0 || Day > MaxDay || new Date(window.Year, window.Month, Day) > oneWeekLater) {
                MainContent += " class='disabled'";
            } else {
                MainContent += ">" + Day.toString();
            }
            MainContent += "</td>";
            DayOffset = DayOffset - 1;
            if (DayOffset < 0) {
                DayOffset = 6;
            }
            Day = Day + 1;
        }
        MainContent += "</tr>";
    }

    MainContent += "</table>";

    window.DatePickerTable.innerHTML = "<tr><td>" + HeaderRow + "</td></tr><tr><td>" + MainContent + "</td></tr>";
}

function SetDate(Obj) {

    if (Obj.innerHTML.toString() != '') {

        window.DateObject.value = Obj.innerHTML.toString() + ' ' + window.Months[window.Month] + ' ' + window.Year.toString();
        ClearDatePicker();

    }
}

function ClearDatePicker() {
    if (window.DatePickerHolder) {
        window.DatePickerHolder.style.display = 'none';
    }
    if (window.DatePickerTable) {
        window.DatePickerTable.style.display = 'none';
    }
    window.Month = null;
    window.Year = null;
}

function FormatDate(DateString) {
    var D = new Date(DateString);
    return D.getDate().toString() + " " + window.Months[D.getMonth()] + " " + D.getFullYear().toString();
}

function FormatDateShort(DateString) {
    var D = new Date(DateString);
    return D.getDate().toString() + " " + window.MonthsShort[D.getMonth()] + " " + D.getFullYear().toString();
}