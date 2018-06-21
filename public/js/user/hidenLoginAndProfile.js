// Have Login
if (localStorage.getItem('access_token')) {
    $('.links .login').hide();
}
// not Login
if (!localStorage.getItem('access_token')) {
    $('.links .myaccount').hide();
}

