//! in input fields add a name 
//! the name is used to identify the values 
//! from the postarray
//! name act as a key in the php array
//! name should be unique

//! label elements are used to access
//! form element compounds
//! id value should be equal to for value to
//! get a connection between label and form elememts

//! fieldset are used to organize a form
//! legend is used to give a title to the fieldset
//! readonly, autofocus, disabled
//! value of disabled is not set to the server
//! if we add autofocus to a form firld when it is loaded

//! we can add pattern attibute to input
//! so that the pattern can be validated

//! to see a custom validation error 
//! you can add title

//! novalidate to add no validation to the form

//! http is stateless any previous request is not depent on current request
//! session is used to remember the states

<?php

//! setting a cookie with expire date if no expire date
//! then it is set to session meaning when we close the browser
//! the data is lost.

//! cookie will expire two days from now
setcookie("example", "hello", time() + 60 * 60 * 24 * 2., '/');

//! to delete a cookie we will set the cookie to a past time
//! the fourth argument is to set the path of the root

//! to display the cookie
var_dump($_COOKIE);