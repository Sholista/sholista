.PHONY: deploy vishal-deploy rajiv-deploy
ID=/home/vish/.ssh/launchec2.pem
# sync files
rsync=rsync -av --exclude-from=.noinstall -e 'ssh -i $(ID)' --no-group . ubuntu@sholista.com:/var/www/
# Change group to www-data
changegrp=ssh -i $(ID) ubuntu@sholista.com sudo chgrp -R www-data /var/www/

deploy:
	$(rsync)www.sholista.com

vishal-deploy:
	$(rsync)vishal.sholista.com

rajiv-deploy:
	$(rsync)rajiv.sholista.com
