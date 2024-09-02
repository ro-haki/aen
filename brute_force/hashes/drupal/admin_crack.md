# best64.rule & rockyou-60
- Generate list 
```
hashcat --stdout -r /usr/share/hashcat/rules/best64.rule /usr/share/wordlists/seclists/Passwords/Leaked-Databases/rockyou-60.txt > base64_mut_rockyou-60.txt
```
- Well NOTHING is there
![[Pasted image 20240902095101.png]]

# leetspeak.rule & rockyou-60
- generate list
```
hashcat --stdout -r /usr/share/hashcat/rules/best64.rule /usr/share/wordlists/seclists/Passwords/Leaked-Databases/rockyou-60.txt > base64_mut_rockyou-60.txt
```
- NOTHING
![[Pasted image 20240902104429.png]]
# rockyou
- Last stop
![[Pasted image 20240902121913.png]]