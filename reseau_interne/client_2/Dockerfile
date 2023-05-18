FROM ubuntu:latest

LABEL group="2TM2-5"

RUN apt -y update
RUN apt -y install links nano sudo dnsutils iputils-ping telnet mutt

RUN adduser francois && echo "francois:francois" | chpasswd

COPY .muttrc /home/francois/.muttrc

CMD ["sleep", "infinity"]