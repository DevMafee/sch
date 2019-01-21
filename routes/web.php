<?php

// Frontend 
Route::get('/home', 'FrontendController@index');
Route::get('/', 'FrontendController@index');
Route::get('/all-notice', 'FrontendController@notice');
Route::get('/aboutus', 'FrontendController@aboutus');
Route::get('/contactus', 'FrontendController@contactus');
Route::get('/courses', 'FrontendController@courses');
Route::get('/all-teachers', 'FrontendController@teachers');

Auth::routes();
// Backend or Dashboard

Route::get('/dashboard', 'HomeController@index');

// Accounts Settings
Route::get('/set-monthly-fee', 'AccountsController@setMonthlyFee');
Route::post('/set-monthly-fee-create', 'AccountsController@setMonthlyFeeCreate');
Route::post('/set-monthly-fee-update', 'AccountsController@setMonthlyFeeUpdate');
Route::delete('/set-monthly-fee-delete/{id}', 'AccountsController@setMonthlyFeeDelete');

// Income & Expanse
Route::get('/setup-income-expanse-head', 'AccountsController@incomeExpanseHead');
Route::post('/setup-income-expanse-head-create', 'AccountsController@incomeExpanseHeadCreate');
Route::post('/setup-income-expanse-head-update', 'AccountsController@incomeExpanseHeadUpdate');
Route::delete('/setup-income-expanse-head-delete/{id}', 'AccountsController@incomeExpanseHeadDelete');

// Fee Type
Route::get('/fee-type', 'FeetypeController@index');
Route::post('/fee-type-create', 'FeetypeController@create');
Route::post('/fee-type-update', 'FeetypeController@update');
Route::delete('/fee-type-delete/{id}', 'FeetypeController@delete');

// Fee Collection
Route::get('/fee-collection', 'CashcollectionController@index');
Route::post('/fee-collection-student-fee-load', 'CashcollectionController@stdFeeLoad')->name('fee-collection-student-fee-load');
Route::post('/fee-collection-student-fee-payment', 'CashcollectionController@stdFeePayment')->name('fee-collection-student-fee-payment');
Route::post('/fee-collection-create', 'CashcollectionController@create');
Route::post('/fee-collection-update', 'CashcollectionController@update');
Route::delete('/fee-collection-delete/{id}', 'CashcollectionController@delete');

// Notice Settings
Route::get('/allnotices', 'NoticesController@index');
Route::post('/notices/create', 'NoticesController@create');
Route::post('/notices/update', 'NoticesController@update');
Route::get('/notices/delete/{id}', 'NoticesController@delete');


// Session Settings
Route::get('/sessions', 'SessionController@index');
Route::post('/sessions/create', 'SessionController@create');
Route::post('/sessions/update', 'SessionController@update');
Route::get('/sessions/delete/{id}', 'SessionController@delete');


// Classes Settings
Route::get('/classes', 'ClassesController@index');
Route::post('/classes/create', 'ClassesController@create');
Route::post('/classes/update', 'ClassesController@update');
Route::delete('/classes/delete/{id}', 'ClassesController@delete');

// Sections Settings
Route::get('/sections', 'SectionsController@index');
Route::post('/sections/create', 'SectionsController@create');
Route::post('/sections/update', 'SectionsController@update');
Route::get('/sections/delete/{id}', 'SectionsController@delete');

// Subjects Settings
Route::get('/subjects', 'SubjectsController@index');
Route::post('/subjects/create', 'SubjectsController@create');
Route::post('/subjects/update', 'SubjectsController@update');
Route::get('/subjects/delete/{id}', 'SubjectsController@delete');

// Syllabus Settings
Route::get('/syllabus', 'SyllabusController@index');
Route::post('/syllabus/create', 'SyllabusController@create');
Route::post('/syllabus/update', 'SyllabusController@update');
Route::delete('/syllabus/delete/{id}', 'SyllabusController@delete');
Route::get('/generate-id-card', 'SyllabusController@idCardShow');

// New-Registration Settings
Route::get('/new-registration', 'StudentRegistrationsController@index');
Route::post('/registration/create', 'StudentRegistrationsController@create');
// Route::post('/registration/update', 'StudentRegistrationsController@update');
Route::get('/registration/delete/{id}', 'StudentRegistrationsController@delete');

// Students Settings
Route::get('/all-students', 'StudentsController@index');
Route::get('/students/create', 'StudentsController@create');
Route::post('/students/store', 'StudentsController@store');
Route::get('/students/edit/{id}', 'StudentsController@edit');
Route::get('/students/view/{id}', 'StudentsController@viewSingle');
Route::post('/students/update', 'StudentsController@update');
Route::delete('/students/delete/{id}', 'StudentsController@delete');
Route::post('/import-student-and-load', 'StudentsController@importStudent')->name('import-student-and-load');
// Search Student 
Route::get('/search-student-and-load', 'StudentsController@findStudent')->name('search-student-and-load');

// Attendances
Route::get('/take-attendance', 'AttendanceController@index');
Route::post('/take-attendance', 'AttendanceController@create');
Route::get('/std-load-attendance', 'AttendanceController@loadStudent')->name('std-load-attendance');
Route::get('/view-attendance', 'AttendanceController@viewAttendance');
Route::get('/std-view-attendance', 'AttendanceController@viewLoadedAttendance')->name('std-view-attendance');
Route::get('/std-view-attendance-monthly', 'AttendanceController@viewLoadedAttendanceMonthly')->name('std-view-attendance-monthly');

// Teacher Settings
Route::get('/teachers', 'TeacherController@index');
Route::post('/teachers/create', 'TeacherController@create');
Route::post('/teachers/update', 'TeacherController@update');
Route::get('/teachers/delete/{id}', 'TeacherController@delete');


// Attendances
Route::get('/teacher-attendance', 'TeacherAttendanceController@index');
Route::post('/teacher-attendance', 'TeacherAttendanceController@create');
Route::get('/teacher-load-attendance', 'TeacherAttendanceController@loadTeacher')->name('teacher-load-attendance');
Route::get('/view-teacher-attendance', 'TeacherAttendanceController@viewAttendance');
Route::get('/teacher-view-attendance', 'TeacherAttendanceController@viewLoadedAttendance')->name('teacher-view-attendance');
Route::get('/teacher-view-attendance-month', 'TeacherAttendanceController@viewLoadedAttendanceMonthly')->name('teacher-view-attendance-month');

// Deciplines Settings
Route::get('/disciplines', 'DisciplinesController@index');
Route::get('/disciplines/create', 'DisciplinesController@create');
Route::post('/disciplines/store', 'DisciplinesController@store');
Route::post('/disciplines/update', 'DisciplinesController@update');
Route::delete('/disciplines/delete/{id}', 'DisciplinesController@delete');

// Home Works
Route::get('/home-works', 'HomeWorkController@index');
Route::post('/home-works', 'HomeWorkController@createHomeWork');
Route::get('/std-load-home-work', 'HomeWorkController@loadStudents')->name('std-load-home-work');
Route::get('/view-home-works', 'HomeWorkController@viewHomeworks');
Route::get('/view-home-work-daily', 'HomeWorkController@viewLoadedHomeWork')->name('view-home-work-daily');
Route::get('/home-work-evaluate/{id}', 'HomeWorkController@evaluateLoadedHomeWork');
Route::get('/home-work-evaluate-loadSTD', 'HomeWorkController@evaluateNowloadSTD')->name('home-work-evaluate-loadSTD');
Route::post('/home-work-evaluate-now', 'HomeWorkController@evaluateNow')->name('home-work-evaluate-now');

Route::get('/load_evaluated_students-list/{id}', 'HomeWorkController@viewevaluatedHomeWorkReport');
// Route::get('/home-work-evaluate/{id}', 'HomeWorkController@evaluateLoadedHomeWork');
// Route::get('/home-work-evaluate-loadSTD', 'HomeWorkController@evaluateNowloadSTD')->name('home-work-evaluate-loadSTD');
// Route::post('/home-work-evaluate-now', 'HomeWorkController@evaluateNow')->name('home-work-evaluate-now');

// Examinations Settings
Route::get('/exams', 'ExaminationController@index');
Route::post('/exams/create', 'ExaminationController@create');
Route::post('/exams/update', 'ExaminationController@update');
Route::get('/exams/delete/{id}', 'ExaminationController@delete');

// Examinations Settings
Route::get('/set-grades', 'SetresultController@index');
Route::post('/set-grades/create', 'SetresultController@create');
Route::post('/set-grades/update', 'SetresultController@update');
Route::delete('/set-grades/delete/{id}', 'SetresultController@delete');

// Assign Marks Settings
Route::get('/assign-marks', 'AssignMarksController@index');
Route::get('/std-load-for-marking', 'AssignMarksController@loadStudents')->name('std-load-for-marking');
Route::post('/assign-marks/create', 'AssignMarksController@createMarks');
Route::get('/view-results', 'AssignMarksController@viewResults');
Route::get('/results-load-of-students', 'AssignMarksController@resultsLoadForStudents')->name('results-load-of-students');


// Assign Marks Settings Play to Five
Route::get('/assign-marks-play-to-five', 'PlaytoFiveResultsController@index');
Route::get('/std-load-for-marking-play-to-five', 'PlaytoFiveResultsController@loadStudents')->name('std-load-for-marking-play-to-five');
Route::post('/assign-marks-play-to-five/create', 'PlaytoFiveResultsController@create');
Route::get('/view-results-play-to-five', 'PlaytoFiveResultsController@viewResults');
Route::get('/results-load-of-students-play-to-five-all', 'PlaytoFiveResultsController@resultsLoadForStudents')->name('results-load-of-students-play-to-five-all');

// Assign Marks Settings Six To Eight
Route::get('/assign-marks-six-to-eight', 'SixToEightResultController@index');
Route::get('/std-load-for-marking-six-to-eight', 'SixToEightResultController@loadStudents')->name('std-load-for-marking-six-to-eight');
Route::post('/assign-marks-six-to-eight/create', 'SixToEightResultController@create');
Route::get('/view-results-six-to-eight', 'SixToEightResultController@viewResults');
Route::get('/results-load-of-students-six-to-eight-all', 'SixToEightResultController@resultsLoadForStudents')->name('results-load-of-students-six-to-eight-all');

// Load Single Result
Route::get('/results-load-of-students-play-to-five', 'ViewResultController@viewSingleResultPlayToFive')->name('results-load-of-students-play-to-five');
Route::get('/results-load-of-students-six-to-eight', 'ViewResultController@viewSingleResultSixToEight')->name('results-load-of-students-six-to-eight');
Route::get('/results-load-of-students-nine-to-ten', 'ViewResultController@viewSingleResultNineToTen')->name('results-load-of-students-nine-to-ten');













// All Basic Settings
Route::get('/basic-setting', 'BasicSettingController@index');

// Contact Number Settings
Route::post('/change-contact-number', 'BasicSettingController@addContactNumber');
Route::delete('/contact-number/delete/{id}', 'BasicSettingController@deleteContactNumber');

// Logo Settings
Route::post('/change-logo', 'BasicSettingController@addLogo');
Route::delete('/logo/delete/{id}', 'BasicSettingController@deleteLogo');

// Favicon Settings
Route::post('/change-favicon', 'BasicSettingController@addFavicon');
Route::delete('/favicon/delete/{id}', 'BasicSettingController@deleteFavicon');

// Slider Settings
Route::post('/change-slider', 'BasicSettingController@addSlider');
Route::delete('/slider/delete/{id}', 'BasicSettingController@deleteSlider');


