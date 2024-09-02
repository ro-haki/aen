# From nmap
- 172.16.8.3 -> DC01
- 172.16.8.20 -> ACADEMY-AEN-DEV
- 172.16.8.50 -> ACADEMY-AEN-MS0
- ACADEMY-AEN-DEV has NFS on port  2049, I  need figure out how can I mount it
- ACADEMY-AEN-MS0 has tomcat on 8080 manager enabled  but I need creds there,
	- potentially I will need to brute passwords for `tomcat`
# SMB
- No one has anonymous access
```
crackmapexec smb IPs   -u '' -p ''
```
![[Pasted image 20240902081036.png]]
- guest too
```
crackmapexec smb IPs -u 'guest' -p '' --users
```
![[Pasted image 20240902081102.png]]
# Kerbrute
##  `john.txt`
- NOTHING
```
kerbrute userenum -d inlanefreight.local --dc 172.16.8.3  /usr/share/wordlists/statistically-likely-usernames/john.txt
```
## `jsmith.txt`
- WE HAVE SOMETHING
- 
```
kerbrute userenum -d inlanefreight.local --dc 172.16.8.3  /opt/wordlist/statistically-likely-usernames/jsmith.txt
```
