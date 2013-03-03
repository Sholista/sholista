deploy:
	rsync -a --exclude-from=.noinstall -e 'ssh -i /home/vish/.ssh/launchec2.pem' . ubuntu@sholista.com:/var/www/www.sholista.com
