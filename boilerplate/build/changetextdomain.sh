#!/bin/sh

if ! [ -f ../style.css ]; then
    echo "Cannot find ../style.css file" 1>&2
    exit 1
fi

if ! [ -f ../functions.php ]; then
    echo "Cannot find ../functions.php file" 1>&2
    exit 1
fi

if ! [ -f ../index.php ]; then
    echo "Cannot find ../index.php file" 1>&2
    exit 1
fi

if [ "$#" = "0" ]; then
    echo "Please provide a new textdomain" 1>&2
    echo "Usage : $0 newTextDomain" 1>&2
    echo "or      $0 oldTextDomain newTextDomain" 1>&2
    exit 1
elif [ "$#" = "1" ]; then
    oldtextdomain='boilerplate_domain_to_change'
    newtextdomain=$1
else
    oldtextdomain=$1
    newtextdomain=$2
fi

echo "Changing text domain from $oldtextdomain to $newtextdomain ...\n"
sed "s/$oldtextdomain/$newtextdomain/g" ../style.css > .tmp1
sed "s/$oldtextdomain/$newtextdomain/g" ../functions.php > .tmp2
sed "s/$oldtextdomain/$newtextdomain/g" ../index.php > .tmp3

mv .tmp1 ../style.css
mv .tmp2 ../functions.php
mv .tmp3 ../index.php

echo " ** Success ! **"
echo "New textdomain inserted. You should now regenerate the pot file."
echo "php i18n/makepot.php wp-theme ../ ../languages/$newtextdomain.pot\n"


