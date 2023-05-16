FROM ubuntu:20.04

RUN apt-get update && apt-get install -y bind9 bind9utils bind9-doc dnsutils

ADD named.conf /etc/bind/named.conf
ADD m2-5.ephec-ti.be.zone /etc/bind/m2-5.ephec-ti.be.zone

RUN chown root:bind /etc/bind/named.conf /etc/bind/m2-5.ephec-ti.be.zone

EXPOSE 53/udp 53/tcp

CMD ["/usr/sbin/named", "-g", "-c", "/etc/bind/named.conf"]