test:
	sh ./tests/run-tests.sh;


doc:
	sh ./dev/documentation.sh;


prepare:
	chmod +x ./dev/documentation.sh;
	chmod +x ./tests/run-tests.sh;
	composer install --dev;
