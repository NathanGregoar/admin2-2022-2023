FROM ubuntu:20.04

RUN apt-get update && apt-get install -y bind9 bind9utils bind9-doc dnsutils

WORKDIR /etc/bind

ADD named.conf.local named.conf.local
ADD zones/m2-5.ephec-ti.be.zone zones/m2-5.ephec-ti.be.zone

RUN chown root:bind named.conf.local zones/m2-5.ephec-ti.be.zone

EXPOSE 53/udp 53/tcp

CMD ["/usr/sbin/named", "-g", "-c", "/etc/bind/named.conf"]
