- `ipconfig` - additional interface `172.16.9.3`
```
Windows IP Configuration


Ethernet adapter Ethernet0:

   Connection-specific DNS Suffix  . : 
   Link-local IPv6 Address . . . . . : fe80::7d44:7be2:3a48:4a26%4
   IPv4 Address. . . . . . . . . . . : 172.16.8.3
   Subnet Mask . . . . . . . . . . . : 255.255.254.0
   Default Gateway . . . . . . . . . : 172.16.8.1

Ethernet adapter Ethernet1:

   Connection-specific DNS Suffix  . : 
   Link-local IPv6 Address . . . . . : fe80::f479:33a6:1fa:326a%7
   IPv4 Address. . . . . . . . . . . : 172.16.9.3
   Subnet Mask . . . . . . . . . . . : 255.255.254.0
   Default Gateway . . . . . . . . . : 172.16.9.1
```
- after double pivot set up
- sweep ping shows only one interesting IP `fping -asgq 172.16.9.0/24 `
```
172.16.9.3
172.16.9.25
```

# Nmap
- default nmap scan shows `nmap 172.16.9.25 -Pn -A`
```
Starting Nmap 7.94SVN ( https://nmap.org ) at 2024-09-13 16:15 EDT
Nmap scan report for 172.16.9.25
Host is up (0.090s latency).
Not shown: 999 filtered tcp ports (no-response)
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 8.2p1 Ubuntu 4ubuntu0.3 (Ubuntu Linux; protocol 2.0)
| ssh-hostkey: 
|_  3072 71:08:b0:c4:f3:ca:97:57:64:97:70:f9:fe:c5:0c:7b (RSA)
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 19.90 seconds

```