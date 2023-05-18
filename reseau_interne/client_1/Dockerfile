FROM ubuntu:latest

LABEL group="2TM2-5"

RUN apt -y update
RUN apt -y install links nano sudo dnsutils iputils-ping telnet mutt

RUN adduser nathan && echo "nathan:nathan" | chpasswd

COPY .muttrc /home/nathan/.muttrc

CMD ["sleep", "infinity"]