- `find / -path /proc -prune -o -type d -perm -o+w -ls 2>/dev/null`
![[Pasted image 20240828153922.png]]

-  `find / -path /proc -prune -o -type f -perm -o+w -ls 2>/dev/null`
	- NOTHING  interesting everhting inside `sys`