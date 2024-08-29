- `find / -group adm  -type f 2>/dev/null`  find all files where group is `adm`, all of them in  `/var/log`
```
./dmesg.0
./dmesg.3.gz
./kern.log.4.gz
./syslog.6.gz
./auth.log.2.gz
./syslog.7.gz
./kern.log.1
./dmesg.1.gz
./auth.log.4.gz
./apt/term.log.2.gz
./apt/term.log
./apt/term.log.3.gz
./apt/term.log.4.gz
./apt/term.log.1.gz
./mail.log.4.gz
./auth.log.3.gz
./apache2/error.log.2.gz
./apache2/error.log.4.gz
./apache2/access.log.3.gz
./apache2/error.log.5.gz
./apache2/access.log.1
./apache2/error.log
./apache2/other_vhosts_access.log.1
./apache2/access.log.4.gz
./apache2/error.log.7.gz
./apache2/other_vhosts_access.log.4.gz
./apache2/error.log.1
./apache2/access.log.2.gz
./apache2/other_vhosts_access.log
./apache2/error.log.6.gz
./apache2/access.log
./apache2/other_vhosts_access.log.3.gz
./apache2/error.log.3.gz
./apache2/other_vhosts_access.log.2.gz
./syslog.5.gz
./mail.log.2.gz
./syslog
./syslog.2.gz
./audit/audit.log
./kern.log.2.gz
./cloud-init.log
./syslog.1
./dmesg.4.gz
./mail.log.1
./auth.log.1
./auth.log
./mail.log.3.gz
./dmesg
./mail.log
./kern.log
./dmesg.2.gz
./cloud-init-output.log
./syslog.4.gz
./kern.log.3.gz
./syslog.3.gz
```
- `find . -type f -ls | grep adm | grep  "Aug 29"` Date has to be changed  according to the current date
```
     3767    284 -rw-r-----   1 syslog   adm        288773 Aug 29 17:17 ./kern.log.1
     3904      0 -rw-r-----   1 root     adm             0 Aug 29 17:17 ./apt/term.log
   262851      4 -rw-r-----   1 root     adm           241 Aug 29 17:17 ./apache2/error.log
   264726      4 -rw-r-----   1 root     adm           320 Aug 29 17:29 ./apache2/other_vhosts_access.log
   262648      4 -rw-r-----   1 root     adm          1559 Aug 29 17:37 ./apache2/access.log
     3213    204 -rw-r-----   1 syslog   adm               206513 Aug 29 17:50 ./syslog
   266212   1724 -rw-r-----   1 root     adm              1758631 Aug 29 17:50 ./audit/audit.log
     3457    564 -rw-r-----   1 syslog   adm               576302 Aug 29 17:17 ./syslog.1
     2396      4 -rw-r-----   1 syslog   adm                  961 Aug 29 17:17 ./mail.log.1
    15625      4 -rw-r-----   1 syslog   adm                 2556 Aug 29 17:17 ./auth.log.1
    13443    168 -rw-r-----   1 syslog   adm               166980 Aug 29 17:50 ./auth.log
      798    108 -rw-r--r--   1 root     adm               106685 Aug 29 17:17 ./dmesg
      654      4 -rw-r-----   1 syslog   adm                  868 Aug 29 17:36 ./mail.log
     8328     16 -rw-r-----   1 syslog   adm                13440 Aug 29 17:36 ./kern.log

```
- `adm` user does not have any write access ` find / -group adm -perm -g=w 2>/dev/null` this command returns nothing