FROM ubuntu/bind9

RUN apt update && apt upgrade -y

WORKDIR /etc/bind

COPY named.conf /etc/bind
COPY m2-5.ephec-ti.be.zone /etc/bind

RUN dnssec-keygen -a RSASHA256 -b 2048 -f KSK m2-5.ephec-ti.be
RUN dnssec-keygen -a RSASHA256 -b 1280 m2-5.ephec-ti.be

RUN for key in `ls Km2-5*.key`; do echo "\$INCLUDE /etc/bind/$key">> m2-5.ephec-ti.be.zone; done

RUN dnssec-signzone -A -3 $(head -c 1000 /dev/random | sha1sum | cut -b 1-16) -N INCREMENT -o m2-5.ephec-ti.be -t m2-5.ephec-ti.be.zone

CMD ["named", "-g"]
