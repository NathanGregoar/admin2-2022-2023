FROM ubuntu/bind9

LABEL group="2TM2-5"

COPY named.conf /etc/bind

EXPOSE 53/udp
EXPOSE 53/tcp

CMD ["named", "-g"]