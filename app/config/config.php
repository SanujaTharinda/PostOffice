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

//Locations

define("CONTROLLERS_LOCATION", APPROOT."/controllers/");
define("MODELS_LOCATION", APPROOT."/models/");
define("VIEWS_LOCATION", APPROOT."/views/");


// Login 

define("LOGIN_SUBMIT", URLROOT."LoginController/validate");


// Navbar

define("HOME_CLICK", URLROOT."NavbarController/home");
define("ABOUT_CLICK", URLROOT."NavbarController/about");
define("LOGOUT_CLICK", URLROOT."NavbarController/logout");

//HomePage

define("MINOR_STAFF_DETAILS_CLICK", URLROOT."MinorStaffDetailsController/minorStaffDetails");

// MainUserDetails

define("MAIN_USER_DETAILS_CLICK", URLROOT."MainUserDetailsController/mainUserDetails");
define("MAIN_USER_DETAILS_ADD_MAINUSER_CLICK", URLROOT."MainUserDetailsController/addMainUser");


// EmployeeUserDetails

define("EMPLOYEE_USER_DETAILS_CLICK", URLROOT."EmployeeUserDetailsController/employeeUserDetails");
define("EMPLOYEE_USER_DETAILS_ADD_EMPLOYEEUSER_CLICK", URLROOT."EmployeeUserDetailsController/addEmployeeUser");


//salary

define("SALARY_CLICK",URLROOT."SalaryController/salaryDetails");

// MinorStaffDetails

define("MINOR_STAFF_DETAILS_SEARCH_CLICK", URLROOT."MinorStaffDetailsController/search");
define("MINOR_STAFF_DETAILS_ADD_EMPLOYEE_CLICK",URLROOT."MinorStaffDetailsController/addEmployeePage" );

define("LEAVE_MANAGEMENT_CLICK_ADMIN", URLROOT."LeaveManagementController/adminLeaveManagementDashboard");


//leave 
define("ADD_LEAVE_TYPE_CLICK", URLROOT."LeaveManagementController/addLeaveType");
define("ADD_LEAVE_CLICK", URLROOT."LeaveManagementController/addLeave");
define("LEAVE_TYPE_CLICK", URLROOT."LeaveManagementController/leaveTypePanel");


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
define("TB_INBOX_CHATS", "inbox");
define("TB_CHATS", "chats");
define("TB_LEAVE_DETAILS","leave_details");
define("TB_LEAVE_TYPE","leave_type");