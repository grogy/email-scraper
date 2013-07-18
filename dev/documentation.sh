#!/bin/bash

PATH="/var/www/emails"
SRC="${PATH}/vendor/apigen/apigen/apigen.php"
DOC="${PATH}/doc"

/usr/bin/php $SRC -s "$PATH/src" -d "$DOC/project"
/usr/bin/php $SRC -s "$PATH/vendor/shuber/curl" -d "$DOC/lib-curl"
/usr/bin/php $SRC -s "$PATH/vendor/dg/dibi" -d "$DOC/lib-dibi"
/usr/bin/php $SRC -s "$PATH/vendor/nette/tester" -d "$DOC/lib-nette-tester"
