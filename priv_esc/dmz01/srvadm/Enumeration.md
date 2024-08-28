-  `/etc/os-release`
```
NAME="Ubuntu"
VERSION="20.04.3 LTS (Focal Fossa)"
ID=ubuntu
ID_LIKE=debian
PRETTY_NAME="Ubuntu 20.04.3 LTS"
VERSION_ID="20.04"
HOME_URL="https://www.ubuntu.com/"
SUPPORT_URL="https://help.ubuntu.com/"
BUG_REPORT_URL="https://bugs.launchpad.net/ubuntu/"
PRIVACY_POLICY_URL="https://www.ubuntu.com/legal/terms-and-policies/privacy-policy"
VERSION_CODENAME=focal
UBUNTU_CODENAME=focal
```
- `uname -a`
```
Linux dmz01 5.4.0-113-generic #127-Ubuntu SMP Wed May 18 14:30:56 UTC 2022 x86_64 x86_64 x86_64 GNU/Linux
```
- PATH
```
/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/usr/games:/usr/local/games:/snap/bin
```
- `lscpu`
```
Architecture:                    x86_64
CPU op-mode(s):                  32-bit, 64-bit
Byte Order:                      Little Endian
Address sizes:                   43 bits physical, 48 bits virtual
CPU(s):                          4
On-line CPU(s) list:             0-3
Thread(s) per core:              1
Core(s) per socket:              1
Socket(s):                       4
NUMA node(s):                    1
Vendor ID:                       AuthenticAMD
CPU family:                      25
Model:                           1
Model name:                      AMD EPYC 7513 32-Core Processor
Stepping:                        1
CPU MHz:                         2595.124
BogoMIPS:                        5190.24
Hypervisor vendor:               VMware
Virtualization type:             full
L1d cache:                       128 KiB
L1i cache:                       128 KiB
L2 cache:                        2 MiB
L3 cache:                        512 MiB
NUMA node0 CPU(s):               0-3
Vulnerability Itlb multihit:     Not affected
Vulnerability L1tf:              Not affected
Vulnerability Mds:               Not affected
Vulnerability Meltdown:          Not affected
Vulnerability Spec store bypass: Vulnerable
Vulnerability Spectre v1:        Mitigation; usercopy/swapgs barriers and __user pointer sanitization
Vulnerability Spectre v2:        Mitigation; Retpolines, IBPB conditional, STIBP disabled, RSB filling
Vulnerability Srbds:             Not affected
Vulnerability Tsx async abort:   Not affected
Flags:                           fpu vme de pse tsc msr pae mce cx8 apic sep mtrr pge mca cmov pat pse36 clflush mmx fxsr sse sse2 syscall nx mmxext fxsr_opt pdpe1gb rdtscp lm constant_ts
                                 c rep_good nopl tsc_reliable nonstop_tsc cpuid extd_apicid pni pclmulqdq ssse3 fma cx16 pcid sse4_1 sse4_2 x2apic movbe popcnt aes xsave avx f16c rdrand h
                                 ypervisor lahf_lm extapic cr8_legacy abm sse4a misalignsse 3dnowprefetch osvw invpcid_single ibpb vmmcall fsgsbase bmi1 avx2 smep bmi2 erms invpcid rdseed
                                  adx smap clflushopt clwb sha_ni xsaveopt xsavec xsaves clzero arat pku ospke overflow_recov succor
```
- files systems and additional drivers,  `lsblk`
```
loop0                       7:0    0  55.5M  1 loop /snap/core18/2409
loop1                       7:1    0  55.7M  1 loop /snap/core18/2812
loop2                       7:2    0  61.9M  1 loop /snap/core20/1494
loop3                       7:3    0  74.2M  1 loop /snap/core22/1122
loop4                       7:4    0 101.3M  1 loop /snap/lxd/23155
loop5                       7:5    0  61.9M  1 loop /snap/core20/1518
loop6                       7:6    0 148.6M  1 loop /snap/lxd/27049
loop7                       7:7    0  44.7M  1 loop /snap/snapd/15904
loop8                       7:8    0    47M  1 loop /snap/snapd/16010
sda                         8:0    0    40G  0 disk 
├─sda1                      8:1    0     1M  0 part 
├─sda2                      8:2    0     1G  0 part /boot
└─sda3                      8:3    0    15G  0 part 
  └─ubuntu--vg-ubuntu--lv 253:0    0    14G  0 lvm  /
```
-  `/etc/fstab`
```
# /etc/fstab: static file system information.
#
# Use 'blkid' to print the universally unique identifier for a
# device; this may be used with UUID= as a more robust way to name devices
# that works even if disks are added and removed. See fstab(5).
#
# <file system> <mount point>   <type>  <options>       <dump>  <pass>
# / was on /dev/ubuntu-vg/ubuntu-lv during curtin installation
/dev/disk/by-id/dm-uuid-LVM-zoHZXlYbLjLFMhq6Aiv0porczzq5I1KtfvSvv1v2Taf4fTvbOuSWdaCoIPK07t2M / ext4 defaults 0 0
# /boot was on /dev/sda2 during curtin installation
/dev/disk/by-uuid/729deb8f-f6f4-4f20-9aa7-f6baecf003a1 /boot ext4 defaults 0 0
```
- mounted file systems `df -h`
```
Filesystem                         Size  Used Avail Use% Mounted on
udev                               3.9G     0  3.9G   0% /dev
tmpfs                              796M  2.0M  794M   1% /run
/dev/mapper/ubuntu--vg-ubuntu--lv   14G   13G  984M  93% /
tmpfs                              3.9G  4.1M  3.9G   1% /dev/shm
tmpfs                              5.0M     0  5.0M   0% /run/lock
tmpfs                              3.9G     0  3.9G   0% /sys/fs/cgroup
/dev/sda2                          976M  108M  801M  12% /boot
/dev/loop1                          56M   56M     0 100% /snap/core18/2812
/dev/loop2                          62M   62M     0 100% /snap/core20/1494
/dev/loop0                          56M   56M     0 100% /snap/core18/2409
/dev/loop3                          75M   75M     0 100% /snap/core22/1122
/dev/loop4                         102M  102M     0 100% /snap/lxd/23155
/dev/loop5                          62M   62M     0 100% /snap/core20/1518
/dev/loop7                          45M   45M     0 100% /snap/snapd/15904
/dev/loop6                         149M  149M     0 100% /snap/lxd/27049
/dev/loop8                          47M   47M     0 100% /snap/snapd/16010
tmpfs                              796M     0  796M   0% /run/user/1003
```
-  route
![[Pasted image 20240828154253.png]]
- passwd
```
root:x:0:0:root:/root:/bin/bash
daemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin
bin:x:2:2:bin:/bin:/usr/sbin/nologin
sys:x:3:3:sys:/dev:/usr/sbin/nologin
sync:x:4:65534:sync:/bin:/bin/sync
games:x:5:60:games:/usr/games:/usr/sbin/nologin
man:x:6:12:man:/var/cache/man:/usr/sbin/nologin
lp:x:7:7:lp:/var/spool/lpd:/usr/sbin/nologin
mail:x:8:8:mail:/var/mail:/usr/sbin/nologin
news:x:9:9:news:/var/spool/news:/usr/sbin/nologin
uucp:x:10:10:uucp:/var/spool/uucp:/usr/sbin/nologin
proxy:x:13:13:proxy:/bin:/usr/sbin/nologin
www-data:x:33:33:www-data:/var/www:/usr/sbin/nologin
backup:x:34:34:backup:/var/backups:/usr/sbin/nologin
list:x:38:38:Mailing List Manager:/var/list:/usr/sbin/nologin
irc:x:39:39:ircd:/var/run/ircd:/usr/sbin/nologin
gnats:x:41:41:Gnats Bug-Reporting System (admin):/var/lib/gnats:/usr/sbin/nologin
nobody:x:65534:65534:nobody:/nonexistent:/usr/sbin/nologin
systemd-network:x:100:102:systemd Network Management,,,:/run/systemd:/usr/sbin/nologin
systemd-resolve:x:101:103:systemd Resolver,,,:/run/systemd:/usr/sbin/nologin
systemd-timesync:x:102:104:systemd Time Synchronization,,,:/run/systemd:/usr/sbin/nologin
messagebus:x:103:106::/nonexistent:/usr/sbin/nologin
syslog:x:104:110::/home/syslog:/usr/sbin/nologin
_apt:x:105:65534::/nonexistent:/usr/sbin/nologin
tss:x:106:111:TPM software stack,,,:/var/lib/tpm:/bin/false
uuidd:x:107:112::/run/uuidd:/usr/sbin/nologin
tcpdump:x:108:113::/nonexistent:/usr/sbin/nologin
landscape:x:109:115::/var/lib/landscape:/usr/sbin/nologin
pollinate:x:110:1::/var/cache/pollinate:/bin/false
usbmux:x:111:46:usbmux daemon,,,:/var/lib/usbmux:/usr/sbin/nologin
sshd:x:112:65534::/run/sshd:/usr/sbin/nologin
systemd-coredump:x:999:999:systemd Core Dumper:/:/usr/sbin/nologin
lab_adm:x:1000:1000:lab_adm:/home/lab_adm:/bin/bash
lxd:x:998:100::/var/snap/lxd/common/lxd:/bin/false
dnsmasq:x:113:65534:dnsmasq,,,:/var/lib/misc:/usr/sbin/nologin
pixel:x:1001:1001::/home/pixel:/bin/sh
tom:x:1002:1002::/home/tom:/bin/sh
srvadm:x:1003:1003::/home/srvadm:/bin/sh
ftp:x:114:120:ftp daemon,,,:/srv/ftp:/usr/sbin/nologin
bind:x:115:121::/var/cache/bind:/usr/sbin/nologin
dovecot:x:116:122:Dovecot mail server,,,:/usr/lib/dovecot:/usr/sbin/nologin
dovenull:x:117:123:Dovecot login user,,,:/nonexistent:/usr/sbin/nologin
postfix:x:118:124::/var/spool/postfix:/usr/sbin/nologin
webdev:x:1004:1004::/home/webdev:/bin/sh
_rpc:x:119:65534::/run/rpcbind:/usr/sbin/nologin
statd:x:120:65534::/var/lib/nfs:/usr/sbin/nologin
```
- group
```
root:x:0:
daemon:x:1:
bin:x:2:
sys:x:3:
adm:x:4:syslog,lab_adm,webdev
tty:x:5:syslog
disk:x:6:
lp:x:7:
mail:x:8:
news:x:9:
uucp:x:10:
man:x:12:
proxy:x:13:
kmem:x:15:
dialout:x:20:
fax:x:21:
voice:x:22:
cdrom:x:24:lab_adm
floppy:x:25:
tape:x:26:
sudo:x:27:lab_adm
audio:x:29:
dip:x:30:lab_adm
www-data:x:33:
backup:x:34:
operator:x:37:
list:x:38:
irc:x:39:
src:x:40:
gnats:x:41:
shadow:x:42:
utmp:x:43:
video:x:44:
sasl:x:45:
plugdev:x:46:lab_adm
staff:x:50:
games:x:60:
users:x:100:
nogroup:x:65534:
systemd-journal:x:101:
systemd-network:x:102:
systemd-resolve:x:103:
systemd-timesync:x:104:
crontab:x:105:
messagebus:x:106:
input:x:107:
kvm:x:108:
render:x:109:
syslog:x:110:
tss:x:111:
uuidd:x:112:
tcpdump:x:113:
ssh:x:114:
landscape:x:115:
lxd:x:116:lab_adm
systemd-coredump:x:999:
lab_adm:x:1000:
netdev:x:117:
ssl-cert:x:118:
docker:x:119:
pixel:x:1001:
tom:x:1002:
srvadm:x:1003:
ftp:x:120:
bind:x:121:
dovecot:x:122:
dovenull:x:123:
postfix:x:124:
postdrop:x:125:
webdev:x:1004:
```
- lastlog
```
Username         Port     From             Latest
root             tty1                      Fri Mar  8 09:55:50 +0000 2024
lab_adm          pts/0    10.129.202.106   Tue May 31 11:31:49 +0000 2022
srvadm           pts/3    10.10.15.185     Wed Aug 28 18:53:42 +0000 2024
webdev           pts/0    10.129.202.106   Wed Jun  1 07:12:53 +0000 2022
```