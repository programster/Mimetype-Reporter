#!/bin/bash

# Run the apache process in the background
/usr/sbin/apache2 -D APACHE_PROCESS &

# run cron service in foreground
cron -f