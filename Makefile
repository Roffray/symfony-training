SYMFONY=/usr/local/bin/symfony

.DEFAULT_GOAL := help
.PHONY: help start stop

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

start:
	$(SYMFONY) serve -d

stop:
	$(SYMFONY) server:stop
