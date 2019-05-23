/**
 *  BUILDING SCSS
 */
require('./main.scss');

/**
 *  COMPILING JAVASCRIPT
 */
require('bootstrap/dist/js/bootstrap');

require('./js/navigation');
require('./js/account');
require('./js/recipe');

/**
 * AJAX FUNCTIONS
 */
require('./js/ajax/user/register');
require('./js/ajax/user/login');
require('./js/ajax/user/update-profile');
require('./js/ajax/user/password');
require('./js/ajax/recipe/addedit-recipe');
require('./js/ajax/recipe/live-search');
require('./js/ajax/tip/addedit-tip');
require('./js/ajax/category/addeditdelete');
require('./js/ajax/contact/add-contact');
