FROM ubuntu/bind9

LABEL group="2TM2-5"

COPY named.conf /etc/bind
COPY m2-5.ephec-ti.be.zone /etc/bind
COPY m2-5.ephec-ti.be.reverse /etc/bind

EXPOSE 53

CMD ["ls", "/etc/bind"]
CMD ["named"]