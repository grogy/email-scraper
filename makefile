run:
	php -f ./src/index.php


test:
	php ./vendor/nette/tester/Tester/tester -j 10 ./tests;


doc:
	sh ./dev/documentation.sh;


prepare:
	chmod +x ./dev/documentation.sh;
	composer install --dev;
