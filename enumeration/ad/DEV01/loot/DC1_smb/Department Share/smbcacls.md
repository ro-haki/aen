
- `find . | sed 's/^\.\///' | sed '1d'  | while read -l i; echo $i; smbcacls '//172.16.8.3/Department Shares' $i -U 'backupjob%lucky7'; end`
- well everything is the same except `IT` it has additional ACL for `ACL:INLANEFREIGHT\Domain Admins:ALLOWED/0x0/READ`
```
IT                                                                                                                                                         
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Admins:ALLOWED/0x0/READ
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

IT/Public        
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

HR        
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

HR/Public        
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

R&D                                                                                                                                                               
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

R&D/Public
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Marketing
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Marketing/Public
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Finance
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Finance/Public
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Accounting
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Accounting/Public
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Executives
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ

Executives/Public
REVISION:1
CONTROL:SR|DI|DP
OWNER:BUILTIN\Administrators
GROUP:INLANEFREIGHT\Domain Users
ACL:INLANEFREIGHT\Domain Users:ALLOWED/0x0/READ
```