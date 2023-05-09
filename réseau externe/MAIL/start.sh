service rsyslog start
postfix start
service dovecot start

touch /var/log/mail.log
tail -f /var/log/mail.log
