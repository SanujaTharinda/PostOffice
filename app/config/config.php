<?php

//Database Parameters

define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'post_office');

define('APPROOT',dirname(dirname(__FILE__)));
define("URLROOT", "http://localhost/PostOffice/");
define("PUBLICROOT", URLROOT."public/");
define("SITENAME", "PostOffice");


// Login 

define("LOGIN_SUBMIT", URLROOT."LoginController/validate");


// Navbar

define("HOME_CLICK", URLROOT."NavbarController/home");
define("ABOUT_CLICK", URLROOT."NavbarController/about");
define("LOGOUT_CLICK", URLROOT."NavbarController/logout");

//HomePage

define("MINOR_STAFF_DETAILS_CLICK", URLROOT."MinorStaffDetailsController/minorStaffDetails");

// MinorStaffDetails

define("MINOR_STAFF_DETAILS_SEARCH_CLICK", URLROOT."MinorStaffDetailsController/search");
define("MINOR_STAFF_DETAILS_ADD_EMPLOYEE_CLICK",URLROOT."MinorStaffDetailsController/addEmployeePage" );


//Attendance

define("ATTENDANCE_CLICK",URLROOT."AttendanceController/attendanceDashboard");



define("TB_attendance", 'attendence_details');
define("TB_duty", 'duty_details');
define("TB_empUser", 'employee_user');
define("TB_mainUser", 'main_user');
define("TB_minor", 'miner_staff');
define("TB_salary", 'salary_details');
define("TB_USERLOG", 'user_login');
define("TB_SYSTEM_LOG", 'system_log');
define("TB_MESSAGES", "messages");




function getRootURL(){
    return URLROOT;
}

