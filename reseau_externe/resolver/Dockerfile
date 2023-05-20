FROM ubuntu/bind9

LABEL group="2TM2-5"

COPY named.conf /etc/bind/
COPY m2-5.ephec-ti.be.zone /etc/bind/

RUN apt-get update && apt-get install -y bind9utils

RUN dnssec-keygen -a RSASHA256 -b 2048 -f KSK m2-5.ephec-ti.be
RUN dnssec-keygen -a RSASHA256 -b 1280 m2-5.ephec-ti.be

RUN find /etc/bind/ -name 'Km2-5*.key' -exec mv {} /etc/bind/Km2-5.key \;
RUN find /etc/bind/ -name 'Km2-5*.private' -exec mv {} /etc/bind/Km2-5.private \;

CMD ["named", "-g"]
