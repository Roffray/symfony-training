SYMFONY=/usr/local/bin/symfony
YARN=/usr/local/bin/yarn
PHPDBG=/usr/local/bin/phpdbg
PHPUNIT=bin/phpunit

.DEFAULT_GOAL := help
.PHONY: help start stop assets coverage

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

##
## Server setup
##---------------------------------------------------------------------------

start:
	$(SYMFONY) serve -d

stop:
	$(SYMFONY) server:stop

##
## Web assets management
##---------------------------------------------------------------------------

assets:
	$(YARN) run dev

coverage:
	$(PHPDBG) -qrr $(PHPUNIT) --coverage-html=var/coverage
