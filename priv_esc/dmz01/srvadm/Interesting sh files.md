- `/tmp/drupal-config.sh`
```bash
sed -i "s/host' =.*/host' => '172.18.0.10',/g" /opt/drupal/web/sites/default/settings.php 
```
- `/opt/drupal.sh`
```bash
#!/bin/bash
ip=$(docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' drupaldb)
cat <<EOF > /tmp/drupal-config.sh
sed -i "s/host' =.*/host' => '$ip',/g" /opt/drupal/web/sites/default/settings.php  
EOF
docker cp /tmp/drupal-config.sh drupal:/tmp/drupal-config.sh
docker exec drupal bash -c 'chmod +x /tmp/drupal-config.sh'
docker exec drupal bash /tmp/drupal-config.sh

```
- `/etc/crontab`
```
SHELL=/bin/sh
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin

# Example of job definition:
# .---------------- minute (0 - 59)
# |  .------------- hour (0 - 23)
# |  |  .---------- day of month (1 - 31)
# |  |  |  .------- month (1 - 12) OR jan,feb,mar,apr ...
# |  |  |  |  .---- day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
# |  |  |  |  |
# *  *  *  *  * user-name command to be executed
17 *    * * *   root    cd / && run-parts --report /etc/cron.hourly
25 6    * * *   root    test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.daily )
47 6    * * 7   root    test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.weekly )
52 6    1 * *   root    test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.monthly )
#
@reboot /bin/bash /opt/drupal.sh

```