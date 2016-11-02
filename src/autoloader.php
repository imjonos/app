<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */
session_start();
require_once  'lib/db.php';
require_once  'lib/model.php';
require_once  'lib/controller.php';
require_once  'lib/auth.php';
require_once  'src/lib/translatorModel.php';
require_once 'src/lib/import.php';


require_once  'helper/pagination.php';

require_once  'model/dictionary.php';
require_once  'model/language.php';
require_once  'model/translation.php';
require_once  'model/user.php';


require_once  'controller/adminController.php';
require_once  'controller/languagesController.php';
require_once  'controller/translationsController.php';
require_once  'controller/loginController.php';
require_once  'controller/importController.php';

require_once  'app.php';


