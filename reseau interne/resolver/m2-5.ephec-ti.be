$ORIGIN m2-5.ephec-ti.be.
$TTL	3600
@	IN	SOA	ns.m2-5.ephec-ti.be.   nathan.m2-5.ephec-ti.be. (

    2022061457 ; serial
    21600      ; refresh after 6 hours
    3600       ; retry after 1 hour
	1814000     ; expire after 3 week
	86400 )    ; minimum TTL of 1 day

;Nom de serveur faisant autoriter sur le domaine m2-5.ephec-ti.be.
@      IN      NS      ns.m2-5.ephec-ti.be.


;Le nom de mon serveur assigner à son IP
ns			IN	A	192.168.0.1;

;Server Web
b2b	IN	A	192.168.0.2;
www	IN	A	192.168.0.2;

;Server Mail
mail	IN	A	192.168.0.4;
@	IN	MX	10	mail;