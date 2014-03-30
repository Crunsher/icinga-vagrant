<?php

use Icinga\Application\EmbeddedWeb;
use Icinga\Web\LessCompiler;

require_once dirname(__FILE__). '/../library/Icinga/Application/ApplicationBootstrap.php';
require_once dirname(__FILE__). '/../library/Icinga/Application/EmbeddedWeb.php';
$app = EmbeddedWeb::start('/etc/icingaweb');
$less = new LessCompiler();

header('Content-Type: text/css');
// TODO: Cache header

$lessfiles = array(
  'css/icinga/defaults.less',
  'css/icinga/layout-colors.less',
  'css/icinga/layout-structure.less',
  'css/icinga/menu.less',
  'css/icinga/header-elements.less',
  'css/icinga/main-content.less',
  'css/icinga/tabs.less',
  'css/icinga/forms.less',
  'css/icinga/pagination.less',
  'css/icinga/monitoring-colors.less',
  'css/icinga/login.less',
);

$basedir = dirname(__FILE__);
foreach ($lessfiles as $file) {
  $less->addFile($basedir . '/' . $file);
}
echo $less->addLoadedModules()->compile();
