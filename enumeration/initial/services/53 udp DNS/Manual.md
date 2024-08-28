# `inlanefreight.local`
- `dnsrecon` with `subdomains-top1milion-5000.txt`  found
	- all records points to the `127.0.0.1`, When a domain is resolved to `127.0.0.1`, it means that any attempt to access `*.inlanefreight.local` would direct the request back to the local machine rather than going out to any external network
```
blog.inlanefreight.local.                86400    IN    A         127.0.0.1
dev.inlanefreight.local.                 86400    IN    A         127.0.0.1
vpn.inlanefreight.local.                 86400    IN    A         127.0.0.1
support.inlanefreight.local.             86400    IN    A         127.0.0.1
status.inlanefreight.local.              86400    IN    A         127.0.0.1
careers.inlanefreight.local.             86400    IN    A         127.0.0.1
tracking.inlanefreight.local.            86400    IN    A         127.0.0.1
ir.inlanefreight.local.                  86400    IN    A         127.0.0.1
gitlab.inlanefreight.local.              86400    IN    A         127.0.0.1
```
- axfr
```
inlanefreight.local.    86400   IN      SOA     ns1.inlanfreight.local. dnsadmin.inlanefreight.local. 21 604800 86400 2419200 86400
inlanefreight.local.    86400   IN      NS      inlanefreight.local.
inlanefreight.local.    86400   IN      A       127.0.0.1
blog.inlanefreight.local. 86400 IN      A       127.0.0.1
careers.inlanefreight.local. 86400 IN   A       127.0.0.1
dev.inlanefreight.local. 86400  IN      A       127.0.0.1
flag.inlanefreight.local. 86400 IN      TXT     "HTB{DNs_ZOn3_Tr@nsf3r}"
gitlab.inlanefreight.local. 86400 IN    A       127.0.0.1
ir.inlanefreight.local. 86400   IN      A       127.0.0.1
status.inlanefreight.local. 86400 IN    A       127.0.0.1
support.inlanefreight.local. 86400 IN   A       127.0.0.1
tracking.inlanefreight.local. 86400 IN  A       127.0.0.1
vpn.inlanefreight.local. 86400  IN      A       127.0.0.1
inlanefreight.local.    86400   IN      SOA     ns1.inlanfreight.local. dnsadmin.inlanefreight.local. 21 604800 86400 2419200 86400
```