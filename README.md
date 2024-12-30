# ownDynDNS
This is a fork of [ownDynDNS](https://github.com/fernwerker/ownDynDNS)
a self-hosted dynamic DNS php script to update netcup DNS API modified to work
with dyndns feature Speedport Smart 4 router.

## Authors of original repo
* Felix Kretschmer [@fernwerker](https://github.com/fernwerker)
* Philipp Tempel [@philipptempel](https://github.com/philipptempel)
* Branko Wilhelm [@b2un0](https://github.com/b2un0)

## Usage
### Installation
* Copy all files to your [webspace](https://community.netcup.com/en/tutorials/ddns-with-webhosting)
* create a copy of `.env.dist` as `.env` and configure:
  * `username` -> The username for your Router to authenticate (so not everyone can update your DNS)
  * `password` -> password for your Router
  * `apiKey` -> API key which is generated in netcup CCP
  * `apiPassword` -> API password which is generated in netcup CCP
  * `customerId` -> your netcup Customer ID
  * `debug` -> true|false enables debug mode and generates output of update.php (normal operation has no output)

* Create each host record in your netcup CCP (DNS settings) before using the script. The script does not create any missing records.

### Router Settings
Will follow...

## References
* DNS API Documentation: https://ccp.netcup.net/run/webservice/servers/endpoint.php
* Source of dnsapi.php: https://ccp.netcup.net/run/webservice/servers/endpoint.php?PHPSOAPCLIENT

## License
Published under GNU General Public License v3.0
Originally by Felix Kretschmer, 2021
Modified by Bakar Chargeishvili, 2024
