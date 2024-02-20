<?php

$locale = PyCore::import('locale');
$sys = PyCore::import('sys');

return [
    (string) $locale->getdefaultlocale(),
    (string) $locale->getpreferredencoding(),
    (string) $sys->getdefaultencoding(),
    (string) $sys->getfilesystemencoding(),
];
