# Domains
```
inlanefreight.local
blog.inlanefreight.local.                86400    IN    A         127.0.0.1
dev.inlanefreight.local.                 86400    IN    A         127.0.0.1
vpn.inlanefreight.local.                 86400    IN    A         127.0.0.1
support.inlanefreight.local.             86400    IN    A         127.0.0.1
status.inlanefreight.local.              86400    IN    A         127.0.0.1
careers.inlanefreight.local.             86400    IN    A         127.0.0.1
tracking.inlanefreight.local.            86400    IN    A         127.0.0.1
ir.inlanefreight.local.                  86400    IN    A         127.0.0.1
gitlab.inlanefreight.local.              86400    IN    A         127.0.0.1

shopdev2.inlanefreight.local
```

# Points
- SMPT allows username enumeration. Tried to verify usernames, didn't give me lot of things.  I need bigger wordlist and more time. I can read `/etc/passwd` in another way
- `inlanefreight.local`
	- [ ] [[Manual look#Team Members]] potential usernames
	- [ ] Login page has been found on http://inlanefreight.local/monitoring, [[Manual look#/monitoring]]
- Drupal on `blog.inlanefreight.local` [[Manual look#`blog.inlanefreight.local`]]
	- BLIND XSS for user and creation feedback, message after creation  says that administrator is going to check it
	- FILE upload on registration page, maybe something related to the CVE-2020-13671
	- Drupal login page
	- plugin for wordpress integration??? but this is crazy all of them 404
- `support.inlanefreight.local` [[Manual look#`support.inlanefreight.local`]]
	- login page with creds
	- raise ticket form
- `careers.inlanefreight.local`
	- login page
	- registration page
	- possible IDOR to check users
- `tracking.inlanefreight.local`
	- some names of clients, potential usernames
	- some sort of pdf tracks search, it returns PDF
	- somehow is connected with `status.inlanefreight.local` because in titles both have ILF
- `gitlab.inlanefreight.local`
	- discovered new domain `shopdev2.inlanefreight.local`
	- found potential username, `jlenny@gitlab.com` this is a user who created initial commit in repository
- `shopdev2.inlanefreight.local`
	- easy creds `admin:admin`
	- XML payload, check for XML injections
		- LFI, I should find some interesting files