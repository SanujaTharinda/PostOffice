function getTodayDate() {
  var date = new Date();
  let year = date.getFullYear();
  let month = (date.getMonth() + 1).toString();
  let day = date.getDate().toString();

  if (day.length == 1) {
    day = "0" + day;
  }
  if (month.length == 1) {
    month = "0" + month;
  }
  return year + "." + month + "." + day;
}






$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "http://localhost/PostOffice/AttendanceController/getAttendanceDashboard",
    success: function (data) {
      console.log(data);
      displayCharts(JSON.parse(data));
    },
  });
});

function displayCharts(values) {
  let lastWeekAttendance = values.pop();
  let previousDayAttendance = values.pop();
  let todayAttendance = values.pop();

  if (!(Object.keys(todayAttendance).pop() == getTodayDate())) {
    previousDayAttendance = Object.assign({}, todayAttendance);
    todayAttendance = null;

  }

  var todayPresent = 0;
  var todayAbsent = 0;


  if (todayAttendance != null) {
    key = Object.keys(todayAttendance).pop()
    todayPresent = todayAttendance[key]['present'];
    todayAbsent = todayAttendance[key]['absent'];
  }


  var previousDayPresent = 0;
  var previousDayAbsent = 0;
  if (previousDayAttendance != null) {
    key = Object.keys(previousDayAttendance).pop()
    previousDayPresent = previousDayAttendance[key]['present'];
    previousDayAbsent = previousDayAttendance[key]['absent'];
  }

  var lastWeekPresent = 0;
  var lastWeekAbsent = 0;
  if (lastWeekAttendance != null) {
    key = Object.keys(lastWeekAttendance).pop()
    lastWeekPresent = lastWeekAttendance[key]['present'];
    lastWeekAbsent = lastWeekAttendance[key]['absent'];
  }

  drawCharts(todayPresent, todayAbsent, previousDayPresent, previousDayAbsent, lastWeekPresent, lastWeekAbsent);
  document.getElementById("todayemployee").innerHTML = todayPresent+todayAbsent

  document.getElementById("todaypresent").innerHTML = todayPresent
  document.getElementById("todayabsent").innerHTML = todayAbsent

  ;

}





function drawCharts(todayPresent, todayAbsent, previousDayPresent, previousDayAbsent, lastWeekPresent, lastWeekAbsent) {
  let ctx = $("#mycanvas_1").get(0).getContext("2d");

  let data = [{
      value: (todayPresent / (todayPresent + todayAbsent)) * 360,
      color: "cornflowerblue",
      highlight: "lightskyblue",
      label: "present",
    },
    {
      value: (todayAbsent / (todayPresent + todayAbsent)) * 360,
      color: "lightgreen",
      highlight: "yellowgreen",
      label: "absent",
    },
    // {
    //   value: 40,
    //   color: "orange",
    //   highlight: "darkorange",
    //   label: "late commers",
    // },
  ];

  let chart = new Chart(ctx).Doughnut(data);

  ctx = $("#mycanvas_2").get(0).getContext("2d");

  data = [{
      value: (previousDayPresent / (previousDayPresent + previousDayAbsent)) * 360,
      color: "cornflowerblue",
      highlight: "lightskyblue",
      label: "present",
    },
    {
      value: (previousDayAbsent / (previousDayPresent + previousDayAbsent)) * 360,
      color: "lightgreen",
      highlight: "yellowgreen",
      label: "absent",
    },
    // {
    //   value: 40,
    //   color: "orange",
    //   highlight: "darkorange",
    //   label: "late commers",
    // },
  ];

  chart = new Chart(ctx).Doughnut(data);

  ctx = $("#mycanvas_3").get(0).getContext("2d");

  data = [{
      value: (lastWeekPresent / (lastWeekPresent + lastWeekAbsent)) * 360,
      color: "cornflowerblue",
      highlight: "lightskyblue",
      label: "present",
    },
    {
      value: (lastWeekAbsent / (lastWeekPresent + lastWeekAbsent)) * 360,
      color: "lightgreen",
      highlight: "yellowgreen",
      label: "absent",
    },
    // {
    //   value: 40,
    //   color: "orange",
    //   highlight: "darkorange",
    //   label: "late commers",
    // },
  ];

  chart = new Chart(ctx).Doughnut(data);

}

