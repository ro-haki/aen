- search for anything related to the other users with bash and in home
```bash
grep -rnIE '\b(tom|pixel|lab_adm|webdev)\b' / 2>/dev/null
```
- I found intersting lines
![[Pasted image 20240902161841.png]]
- and it appears that `webdev` has password  `Rand0mPassw0rdw3bd3VI`
- I managed to find this file `/etc/default/'bind9'$'\r'`