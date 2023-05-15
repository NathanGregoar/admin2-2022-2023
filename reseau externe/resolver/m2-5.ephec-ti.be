$ORIGIN m2-5.ephec-ti.be.
$TTL	3600
@	IN	SOA	ns.m2-5.ephec-ti.be.   nathan.m2-5.ephec-ti.be. (
    2022061457 ; serial
    21600      ; refresh after 6 hours
    3600       ; retry after 1 hour
    1814000    ; expire after 3 weeks
    86400      ; minimum TTL of 1 day
)

        IN      NS      ns.m2-5.ephec-ti.be.
        IN      MX      10      mail.m2-5.ephec-ti.be.

ns      IN      A       192.168.0.1
b2b     IN      A       192.168.0.2
www     IN      A       192.168.0.2
mail    IN      A       192.168.0.4

intranet        IN      A       192.168.0.2
www             IN      A       192.168.0.2
b2b             IN      A       192.168.0.2

@               IN      MX      10      mail.m2-5.ephec-ti.be.
