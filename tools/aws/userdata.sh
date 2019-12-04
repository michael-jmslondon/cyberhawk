#!/bin/bash
yum update -y
yum install -y httpd git php
systemctl start httpd
systemctl enable httpd
usermod -a -G apache ec2-user
chown -R ec2-user:apache /var/www
chmod 2775 /var/www
find /var/www -type d -exec chmod 2775 {} \;
find /var/www -type f -exec chmod 0664 {} \;
git clone https://github.com/michael-jmslondon/cyberhawk.git /srv/.
ln -s /srv/cyberhawk/server/index.php /var/www/html/.
ln -s /srv/cyberhawk/server/indexajax.php /var/www/html/.
ln -s /srv/cyberhawk/server/js /var/www/html/.
ln -s /srv/cyberhawk/server/css /var/www/html/.
ln -s /srv/cyberhawk/server/api /var/www/html/.
