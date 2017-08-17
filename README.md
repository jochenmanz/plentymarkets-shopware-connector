![plentymarkets Logo](http://www.plentymarkets.eu/layout/pm/images/logo/plentymarkets-logo.jpg)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bhttps%3A%2F%2Fgithub.com%2Fjochenmanz%2Fplentymarkets-shopware-connector.svg?type=shield)](https://app.fossa.io/projects/git%2Bhttps%3A%2F%2Fgithub.com%2Fjochenmanz%2Fplentymarkets-shopware-connector?ref=badge_shield)

# PlentyConnector

* **License:** MIT
* **Repository:** [Github](https://github.com/plentymarkets/plentymarkets-shopware-connector)
* **Documentation:** [Google Docs](https://docs.google.com/document/d/10mPeV3xqx4We71dYQdPmJK2qvb21Rpym6FG_tKwHKfc/edit?usp=sharing)

## Requirements

* plentymarkets version >= 7.0
* shopware version >= 5.2
* shell access
* cronjobs
* active plentymarkets webshop
* plentymarkets user with all rest permissions

## Installation Guide

### Git

**Prepare Plugin**
* cd Shopware/custom/plugins
* git clone https://github.com/plentymarkets/plentymarkets-shopware-connector.git PlentyConnector
* cd PlentyConnector
* composer install --no-dev

**Install Plugin**
* cd Shopware
* ./bin/console sw:plugin:refresh
* ./bin/console sw:plugin:install --activate PlentyConnector
* ./var/cache/clear_cache.sh

**Configure Plugin**
* visit yourshopwaredomain/backend
* open Settings > PlentyConnector
* add and test api creddentials
* complete all necessary mappings



## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bhttps%3A%2F%2Fgithub.com%2Fjochenmanz%2Fplentymarkets-shopware-connector.svg?type=large)](https://app.fossa.io/projects/git%2Bhttps%3A%2F%2Fgithub.com%2Fjochenmanz%2Fplentymarkets-shopware-connector?ref=badge_large)