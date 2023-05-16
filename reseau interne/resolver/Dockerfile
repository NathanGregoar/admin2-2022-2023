FROM ubuntu/bind9:latest

LABEL group="2TM2-5"

COPY named.conf /etc/bind/named.conf
COPY woodytoys.lab /etc/bind/woodytoys.lab
COPY woodytoys.lab.reverse /etc/bind/woodytoys.lab.reverse
COPY m2-5.ephec-ti.be.zone /etc/bind/m2-5.ephec-ti.be.zone

EXPOSE 53/udp
EXPOSE 53/tcp

CMD ["named", "-g"]