<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'patient';

//Patient Route
$route['P/Login'] = 'patient/login';
$route['P/Success'] = 'patient/registersuccess';
$route['P/Register'] = 'patient/register';
$route['P/HealthService'] = 'patient';
$route['P/ForMyself'] = 'patient/formyself';
$route['P/ForPedia'] = 'patient/forpedia';
$route['P/ForPedia2/(:num)'] = 'patient/forpedia2/$1';
$route['P/ForOthers2/(:num)'] = 'patient/forothers2/$1';
$route['P/ForOthers'] = 'patient/forothers';
$route['P/Notifications'] = 'patient/notifications';
$route['P/ViewNotifications/(:num)'] = 'patient/viewnotification/$1';
$route['P/Account'] = 'patient/account';
$route['P/OpenMessages'] = 'patient/chat';
$route['P/Messages'] = 'patient/mainchat';
$route['P/ViewAppointment/(:num)'] = 'patient/viewapp/$1';
$route['P/ForgotPasswordEmail'] = 'patient/forgotpasswordemail';
$route['P/ForgotPassword/(:any)/(:any)'] = 'patient/forgotpassword/$1/$2';
$route['P/SuccessEmailSent/(:any)'] = 'patient/forgotemailsent/$1';
$route['P/ViewSetAppointment/(:num)'] = 'patient/doctorsetappoint/$1';

//Doctor Route
$route['D/Login'] = 'doctor/login';
$route['D/Patient'] = 'doctor';
$route['D/Appointments'] = 'doctor/appointment';
$route['D/ViewAppointment/(:num)'] = 'doctor/viewappointment/$1';
$route['D/Profile'] = 'doctor/profile';
$route['D/ViewPatient/(:num)'] = 'doctor/viewpatient/$1';
$route['D/Patient/Reminder'] = 'doctor/reminder';
$route['D/Messages'] = 'doctor/mainchat';
$route['D/OpenMessages'] = 'doctor/chat';
$route['D/SetAppointment/(:num)'] = 'doctor/doctorappoint/$1';
$route['D/ViewSetAppointment/(:num)'] = 'doctor/doctorsetappoint/$1';
$route['D/Notifications'] = 'doctor/notifications';

//Admin Route
$route['Admin'] = 'admin';
$route['Admin/ResidentsList'] = 'admin/residentlist';
$route['Admin/RegisteredAccount'] = 'admin/registeredaccount';
$route['Admin/Dashboard'] = 'admin/dashboard';
$route['Admin/ViewAccount/(:any)'] = 'admin/viewaccounts/$1';
$route['Admin/AddAccounts'] = 'admin/addaccount';
$route['Admin/ViewMedicalStaff'] = 'admin/medicalaccount';
$route['Admin/ManageAccount'] = 'admin/manageaccount';
$route['Admin/ViewAdminAccount'] = 'admin/viewadminaccount';
$route['Admin/BackupAndRestore'] = 'admin/backupandrestore';
$route['Admin/ViewHealthWorker'] = 'admin/viewhealthworker';
$route['Admin/ViewWalkIn'] = 'admin/viewrecord';
$route['Admin/Notification'] = 'admin/notif';
$route['Admin/ViewNotification'] = 'admin/viewnotification';

//Health worker Route
$route['HealthWorker'] = 'healthworker';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
