- Enabled RDP
```powershell
Set-ItemProperty -Path 'HKLM:\System\CurrentControlSet\Control\Terminal Server\' -Name "fDenyTSConnections" -Value 0

Enable-NetFirewallRule -DisplayGroup "Remote Desktop"
```
- add Administrator to group
```powershell
net localgroup "Remote Desktop Users" Administrator /add
```
- and change password for administrator
```powershell
net user Administrator admin2220
```