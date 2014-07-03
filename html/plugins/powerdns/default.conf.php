<?php
/*
 * This file is part of LibrePanel
 *
 * Copyright (c) 2014 Bohdan Sanders <http://bohdans.com/>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */
?>
<?php
if ( !(isset($authenticated) && $authenticated === true )) {
  echo('<script>window.location.href = "/";</script>');
  echo('Please Login to access this page');
  exit;
}
?>

<?php
// Default location of conf file
$config['powerdns']['conf_location'] = '/etc/pdns/pdns.conf';

// Set up all the desctiptions
$config['powerdns']['conf']['allow-axfr-ips']['value']='';
$config['powerdns']['conf']['allow-axfr-ips']['description']='If set, only these IP addresses or netmasks will be able to perform AXFR.';
$config['powerdns']['conf']['allow-recursion']['value']='';
$config['powerdns']['conf']['allow-recursion']['description']='By specifying allow-recursion, recursion can be restricted to netmasks specified. The default is to allow recursion from everywhere. Example: allow-recursion=192.168.0.0/24, 10.0.0.0/8, 192.0.2.4';
$config['powerdns']['conf']['also-notify']['value']='';
$config['powerdns']['conf']['also-notify']['description']='When notifying a domain, also notify these nameservers. Example: also-notify=192.168.0.1, 10.0.0.1. The IP adresses listed in also-notify always receive a notification. Even if they do not mach the list in only-notify.';
$config['powerdns']['conf']['any-to-tcp']['value']='no';
$config['powerdns']['conf']['any-to-tcp']['description']='Answer questions for the ANY and RRSIG types on UDP with a truncated packet that refers the remote server to TCP. Useful for mitigating reflection attacks. Defaults to off. Available since 3.3.';
$config['powerdns']['conf']['cache-ttl']['value']='';
$config['powerdns']['conf']['cache-ttl']['description']='Seconds to store packets in the PacketCache. See Section 2.1, "Packet Cache".';
$config['powerdns']['conf']['carbon-ourname']['value']='';
$config['powerdns']['conf']['carbon-ourname']['description']='If sending carbon updates, if set, this will override our hostname. See Chapter 27, PowerDNS Metrics, and how to display them. Available beyond 3.3.1.';
$config['powerdns']['conf']['carbon-server']['value']='';
$config['powerdns']['conf']['carbon-server']['description']='If set to an IP or IPv6 address, will send all available metrics to this server via the carbon protocol, which is used by graphite and metronome. See Chapter 27, PowerDNS Metrics, and how to display them. Available beyond 3.3.1.';
$config['powerdns']['conf']['carbon-interval']['value']='';
$config['powerdns']['conf']['carbon-interval']['description']='If sending carbon updates, this is the interval between them in seconds. See Chapter 27, PowerDNS Metrics, and how to display them. Available beyond 3.3.1.';
$config['powerdns']['conf']['chroot']['value']='';
$config['powerdns']['conf']['chroot']['description']='If set, chroot to this directory for more security. See Chapter 7, Security settings & considerations.';
$config['powerdns']['conf']['config-dir']['value']='';
$config['powerdns']['conf']['config-dir']['description']='Location of configuration directory (pdns.conf)';
$config['powerdns']['conf']['config-name']['value']='';
$config['powerdns']['conf']['config-name']['description']='Name of this virtual configuration - will rename the binary image. See Chapter 8, Virtual hosting.';
$config['powerdns']['conf']['daemon']['value']='no';
$config['powerdns']['conf']['daemon']['description']='Operate as a daemon';
$config['powerdns']['conf']['default-soa-name']['value']='';
$config['powerdns']['conf']['default-soa-name']['description']='name to insert in the SOA record if none set in the backend';
$config['powerdns']['conf']['default-soa-mail']['value']='';
$config['powerdns']['conf']['default-soa-mail']['description']='mail address to insert in the SOA record if none set in the backend';
$config['powerdns']['conf']['default-ttl']['value']='';
$config['powerdns']['conf']['default-ttl']['description']='TTL to use when none is provided.';
$config['powerdns']['conf']['direct-dnskey']['value']='';
$config['powerdns']['conf']['direct-dnskey']['description']='Read additional ZSKs from the records table/your BIND zonefile';
$config['powerdns']['conf']['disable-axfr']['value']='';
$config['powerdns']['conf']['disable-axfr']['description']='Do not allow zone transfers. Before 2.9.10, this could be overridden by allow-axfr-ips.';
$config['powerdns']['conf']['disable-axfr-rectify']['value']='no';
$config['powerdns']['conf']['disable-axfr-rectify']['description']='Disable the rectify step during an outgoing AXFR. Only required for regression testing. Default is no.';
$config['powerdns']['conf']['disable-tcp']['value']='';
$config['powerdns']['conf']['disable-tcp']['description']='Do not listen to TCP queries. Breaks RFC compliance.';
$config['powerdns']['conf']['distributor-threads']['value']='';
$config['powerdns']['conf']['distributor-threads']['description']='Number of Distributor (backend) threads to start per receiver thread. See Chapter 9, Authoritative Server Performance.';
$config['powerdns']['conf']['do-ipv6-additional-processing']['value']='';
$config['powerdns']['conf']['do-ipv6-additional-processing']['description']='Perform AAAA additional processing.';
$config['powerdns']['conf']['edns-subnet-option-number']['value']='';
$config['powerdns']['conf']['edns-subnet-option-number']['description']='If edns-subnet-processing is enabled, this option allows the user to override the option number.';
$config['powerdns']['conf']['edns-subnet-processing']['value']='';
$config['powerdns']['conf']['edns-subnet-processing']['description']='Enables EDNS subnet processing, for backends that support it.';
$config['powerdns']['conf']['entropy-source']['value']='';
$config['powerdns']['conf']['entropy-source']['description']='Entropy source (like /dev/urandom).';
$config['powerdns']['conf']['fancy-records']['value']='';
$config['powerdns']['conf']['fancy-records']['description']='Process URL and MBOXFW records. See Chapter 20, Fancy records for seamless email and URL integration.';
$config['powerdns']['conf']['guardian']['value']='';
$config['powerdns']['conf']['guardian']['description']='Run within a guardian process. See Section 2, "Guardian".';
$config['powerdns']['conf']['include-dir']['value']='';
$config['powerdns']['conf']['include-dir']['description']='Directory to scan for additional config files. All files that end with .conf are loaded in order.';
$config['powerdns']['conf']['launch']['value']='';
$config['powerdns']['conf']['launch']['description']='Which backends to launch and order to query them in. See Section 3, "Modules & Backends".';
$config['powerdns']['conf']['lazy-recursion']['value']='';
$config['powerdns']['conf']['lazy-recursion']['description']='On by default as of 2.1. Checks local data first before recursing. See Chapter 17, Recursion.';
$config['powerdns']['conf']['load-modules']['value']='';
$config['powerdns']['conf']['load-modules']['description']='Load this module - supply absolute or relative path. See Section 3, "Modules & Backends".';
$config['powerdns']['conf']['local-address']['value']='';
$config['powerdns']['conf']['local-address']['description']='Local IP address to which we bind. You can specify multiple addresses separated by commas or whitespace. It is highly advised to bind to specific interfaces and not use the default bind to any. This causes big problems if you have multiple IP addresses. Unix does not provide a way of figuring out what IP address a packet was sent to when binding to any.';
$config['powerdns']['conf']['local-ipv6']['value']='';
$config['powerdns']['conf']['local-ipv6']['description']='Local IPv6 address to which we bind. You can specify multiple addresses separated by commas or whitespace.';
$config['powerdns']['conf']['local-port']['value']='';
$config['powerdns']['conf']['local-port']['description']='The port on which we listen. Only one port possible.';
$config['powerdns']['conf']['log-dns-details']['value']='';
$config['powerdns']['conf']['log-dns-details']['description']='If set to no, informative-only DNS details will not even be sent to syslog, improving performance. Available from 2.5 and onwards.';
$config['powerdns']['conf']['logging-facility']['value']='';
$config['powerdns']['conf']['logging-facility']['description']='If set to a digit, logging is performed under this LOCAL facility. See Section 3, "Operational logging using syslog". Available from 1.99.9 and onwards. Do not pass names like local0!';
$config['powerdns']['conf']['loglevel']['value']='';
$config['powerdns']['conf']['loglevel']['description']='Amount of logging. Higher is more. Do not set below 3';
$config['powerdns']['conf']['log-dns-queries']['value']='';
$config['powerdns']['conf']['log-dns-queries']['description']='Tell PowerDNS to log all incoming DNS queries. This will lead to a lot of logging! Only enable for debugging!';
$config['powerdns']['conf']['lua-prequery-script']['value']='';
$config['powerdns']['conf']['lua-prequery-script']['description']='Lua script to run before answering a query. This is a feature used internally for regression testing. The API of this functionality is not guaranteed to be stable, and is in fact likely to change.';
$config['powerdns']['conf']['master']['value']='no';
$config['powerdns']['conf']['master']['description']='Turn on master support. Boolean.';
$config['powerdns']['conf']['max-cache-entries']['value']='';
$config['powerdns']['conf']['max-cache-entries']['description']='Maximum number of cache entries. 1 million will generally suffice for most installations. Available since version 2.9.22.';
$config['powerdns']['conf']['max-ent-entries']['value']='';
$config['powerdns']['conf']['max-ent-entries']['description']='Maximum number of empty non-terminals to add to a zone. This is a protection measure to avoid database explosion due to long names.';
$config['powerdns']['conf']['max-queue-length']['value']='';
$config['powerdns']['conf']['max-queue-length']['description']='If this many packets are waiting for database attention, consider the situation hopeless and respawn.';
$config['powerdns']['conf']['max-tcp-connections']['value']='';
$config['powerdns']['conf']['max-tcp-connections']['description']='Allow this many incoming TCP DNS connections simultaneously.';
$config['powerdns']['conf']['module-dir']['value']='';
$config['powerdns']['conf']['module-dir']['description']='Default directory for modules. See Section 3, "Modules & Backends".';
$config['powerdns']['conf']['negquery-cache-ttl']['value']='';
$config['powerdns']['conf']['negquery-cache-ttl']['description']='Seconds to store queries with no answer in the Query Cache. See Section 2.2, "Query Cache".';
$config['powerdns']['conf']['no-config']['value']='';
$config['powerdns']['conf']['no-config']['description']='Do not attempt to read the configuration file.';
$config['powerdns']['conf']['no-shuffle']['value']='';
$config['powerdns']['conf']['no-shuffle']['description']='Do not attempt to shuffle query results.';
$config['powerdns']['conf']['overload-queue-length']['value']='';
$config['powerdns']['conf']['overload-queue-length']['description']='If this many packets are waiting for database attention, answer any new questions strictly from the packet cache.';
$config['powerdns']['conf']['reuseport']['value']='';
$config['powerdns']['conf']['reuseport']['description']='On Linux 3.9 and some BSD kernels the SO_REUSEPORT option allows each receiver-thread to open a new socket on the same port which allows for much higher performance on multi-core boxes. Setting this option will enable use of SO_REUSEPORT when available and seamlessly fall back to a single socket when it is not available. A side-effect is that you can start multiple servers on the same IP/port combination which may or may not be a good idea. You could use this to enable transparent restarts, but it may also mask configuration issues and for this reason it is disabled by default.';
$config['powerdns']['conf']['server-id']['value']='';
$config['powerdns']['conf']['server-id']['description']='his is the server ID that will be returned on an EDNS NSID query. Defaults to the host name.';
$config['powerdns']['conf']['only-notify']['value']='';
$config['powerdns']['conf']['only-notify']['description']='Only send AXFR NOTIFY to these IP addresses or netmasks. The default is to notify the world. The IP addresses or netmasks in also-notify or ALSO-NOTIFY metadata always receive AXFR NOTIFY. Example (and default): only-notify=0.0.0.0/0, ::/0.';
$config['powerdns']['conf']['out-of-zone-additional-processing']['value']='';
$config['powerdns']['conf']['out-of-zone-additional-processing']['description']='Do out of zone additional processing. This means that if a malicious user adds a .com zone to your server, it is not used for other domains and will not contaminate answers. Do not enable this setting if you run a public DNS service with untrusted users. Off by default.';
$config['powerdns']['conf']['pipebackend-abi-version']['value']='';
$config['powerdns']['conf']['pipebackend-abi-version']['description']='ABI version to use for the pipe backend. See Section 1.1, "PipeBackend protocol".';
$config['powerdns']['conf']['prevent-self-notification']['value']='';
$config['powerdns']['conf']['prevent-self-notification']['description']='Available as of 3.3. PowerDNS Authoritative Server attempts to not send out notifications to itself in master mode. In very complicated situations we could guess wrong and not notify a server that should be notified. In that case, set prevent-self-notification to "no".';
$config['powerdns']['conf']['query-cache-ttl']['value']='';
$config['powerdns']['conf']['query-cache-ttl']['description']='Seconds to store queries with an answer in the Query Cache. See Section 2.2, "Query Cache".';
$config['powerdns']['conf']['query-local-address']['value']='';
$config['powerdns']['conf']['query-local-address']['description']='The IP address to use as a source address for sending queries. Useful if you have multiple IPs and pdns is not bound to the IP address your operating system uses by default for outgoing packets.';
$config['powerdns']['conf']['query-local-address6']['value']='';
$config['powerdns']['conf']['query-local-address6']['description']='Source IP address for sending IPv6 queries.';
$config['powerdns']['conf']['query-logging']['value']='';
$config['powerdns']['conf']['query-logging']['description']='Hints to a backend that it should log a textual representation of queries it performs. Can be set at runtime.';
$config['powerdns']['conf']['queue-limit']['value']='';
$config['powerdns']['conf']['queue-limit']['description']='Maximum number of milliseconds to queue a query. See Chapter 9, Authoritative Server Performance.';
$config['powerdns']['conf']['receiver-threads']['value']='';
$config['powerdns']['conf']['receiver-threads']['description']='Number of receiver (listening) threads to start. See Chapter 9, Authoritative Server Performance for tuning details.';
$config['powerdns']['conf']['recursive-cache-ttl']['value']='';
$config['powerdns']['conf']['recursive-cache-ttl']['description']='Seconds to store recursive packets in the PacketCache. See Section 2.1, "Packet Cache".';
$config['powerdns']['conf']['recursor']['value']='';
$config['powerdns']['conf']['recursor']['description']='If set, recursive queries will be handed to the recursor specified here. See Chapter 17, Recursion.';
$config['powerdns']['conf']['retrieval-threads']['value']='';
$config['powerdns']['conf']['retrieval-threads']['description']='Number of AXFR slave threads to start.';
$config['powerdns']['conf']['send-root-referral']['value']='';
$config['powerdns']['conf']['send-root-referral']['description']='If set, PowerDNS will send out old-fashioned root-referrals when queried for domains for which it is not authoritative. Wastes some bandwidth but may solve incoming query floods if domains are delegated to you for which you are not authoritative, but which are queried by broken recursors. Available since version 2.9.19.';
$config['powerdns']['conf']['setgid']['value']='';
$config['powerdns']['conf']['setgid']['description']='If set, change group id to this gid for more security. See Chapter 7, Security settings & considerations.';
$config['powerdns']['conf']['setuid']['value']='';
$config['powerdns']['conf']['setuid']['description']='If set, change user id to this uid for more security. See Chapter 7, Security settings & considerations.';
$config['powerdns']['conf']['slave']['value']='no';
$config['powerdns']['conf']['slave']['description']='Turn on slave support. Boolean.';
$config['powerdns']['conf']['slave-cycle-interval']['value']='60';
$config['powerdns']['conf']['slave-cycle-interval']['description']='Schedule slave up-to-date checks of domains whose status is unknown every .. seconds.';
$config['powerdns']['conf']['slave-renotify']['value']='no';
$config['powerdns']['conf']['slave-renotify']['description']='This setting will make PowerDNS renotify the slaves after an AXFR is *received* from a master. This is useful when using when running a signing-slave.';
$config['powerdns']['conf']['signing-threads']['value']='3';
$config['powerdns']['conf']['signing-threads']['description']='Tell PowerDNS how many threads to use for signing. It might help improve signing speed by changing this number.';
$config['powerdns']['conf']['smtpredirector']['value']='';
$config['powerdns']['conf']['smtpredirector']['description']='Our smtpredir MX host. See Chapter 20, Fancy records for seamless email and URL integration.';
$config['powerdns']['conf']['soa-expire-default']['value']='604800';
$config['powerdns']['conf']['soa-expire-default']['description']='Default SOA expire.';
$config['powerdns']['conf']['soa-minimum-ttl']['value']='3600';
$config['powerdns']['conf']['soa-minimum-ttl']['description']='Default SOA minimum ttl.';
$config['powerdns']['conf']['soa-refresh-default']['value']='10800';
$config['powerdns']['conf']['soa-refresh-default']['description']='Default SOA refresh.';
$config['powerdns']['conf']['soa-retry-default']['value']='3600';
$config['powerdns']['conf']['soa-retry-default']['description']='Default SOA retry.';
$config['powerdns']['conf']['soa-serial-offset']['value']='';
$config['powerdns']['conf']['soa-serial-offset']['description']='If your database contains single-digit SOA serials and you need to host .DE domains, this setting can help placate their 6-digit SOA serial requirements. Suggested value is to set this to 1000000 which adds 1000000 to all SOA Serials under that offset.';
$config['powerdns']['conf']['socket-dir']['value']='';
$config['powerdns']['conf']['socket-dir']['description']='Where the controlsocket will live. See Section 1, "Controlsocket".';
$config['powerdns']['conf']['strict-rfc-axfrs']['value']='no';
$config['powerdns']['conf']['strict-rfc-axfrs']['description']='Perform strictly RFC-conforming AXFRs, which are slow, but may be necessary to placate some old client tools.';
$config['powerdns']['conf']['tcp-control-address']['value']='';
$config['powerdns']['conf']['tcp-control-address']['description']='Address to bind to for TCP control.';
$config['powerdns']['conf']['tcp-control-port']['value']='';
$config['powerdns']['conf']['tcp-control-port']['description']='Port to bind to for TCP control.';
$config['powerdns']['conf']['tcp-control-range']['value']='';
$config['powerdns']['conf']['tcp-control-range']['description']='Limit TCP control to a specific client range.';
$config['powerdns']['conf']['tcp-control-secret']['value']='';
$config['powerdns']['conf']['tcp-control-secret']['description']='Password for TCP control.';
$config['powerdns']['conf']['traceback-handler']['value']='on';
$config['powerdns']['conf']['traceback-handler']['description']='Enable the Linux-only traceback handler (default on).';
$config['powerdns']['conf']['trusted-notification-proxy']['value']='';
$config['powerdns']['conf']['trusted-notification-proxy']['description']='IP address of incoming notification proxy ';
$config['powerdns']['conf']['udp-truncation-threshold']['value']='';
$config['powerdns']['conf']['udp-truncation-threshold']['description']='EDNS0 allows for large UDP response datagrams, which can potentially raise performance. Large responses however also have downsides in terms of reflection attacks. Up till PowerDNS Authoritative Server 3.3, the truncation limit was set at 1680 bytes, regardless of EDNS0 buffer size indications from the client. Beyond 3.3, this setting makes our truncation limit configurable. Maximum value is 65535, but values above 4096 should probably not be attempted.';
$config['powerdns']['conf']['urlredirector']['value']='';
$config['powerdns']['conf']['urlredirector']['description']='Where we send hosts to that need to be url redirected. See Chapter 20, Fancy records for seamless email and URL integration.';
$config['powerdns']['conf']['version-string']['value']='full';
$config['powerdns']['conf']['version-string']['description']='When queried for its version over DNS (dig chaos txt version.bind @pdns.ip.address), PowerDNS normally responds truthfully. With this setting you can overrule what will be returned. Set the version-string to full to get the default behaviour, to powerdns to just make it state served by PowerDNS - http://www.powerdns.com. The anonymous setting will return a ServFail, much like Microsoft nameservers do. You can set this response to a custom value as well. anonymous|powerdns|full|custom';
$config['powerdns']['conf']['webserver']['value']='no';
$config['powerdns']['conf']['webserver']['description']='Start a webserver for monitoring. See Chapter 6, Logging & Monitoring Authoritative Server performance.';
$config['powerdns']['conf']['webserver-address']['value']='';
$config['powerdns']['conf']['webserver-address']['description']='IP Address of webserver to listen on. See Chapter 6, Logging & Monitoring Authoritative Server performance.';
$config['powerdns']['conf']['webserver-password']['value']='';
$config['powerdns']['conf']['webserver-password']['description']='Password required for accessing the webserver. See Chapter 6, Logging & Monitoring Authoritative Server performance.';
$config['powerdns']['conf']['webserver-port']['value']='';
$config['powerdns']['conf']['webserver-port']['description']='Port of webserver to listen on. See Chapter 6, Logging & Monitoring Authoritative Server performance.';
$config['powerdns']['conf']['webserver-print-arguments']['value']='';
$config['powerdns']['conf']['webserver-print-arguments']['description']='If the webserver should print arguments. See Chapter 6, Logging & Monitoring Authoritative Server performance.';
$config['powerdns']['conf']['wildcard-url']['value']='';
$config['powerdns']['conf']['wildcard-url']['description']='Check for wildcard URL records.';

// MySQL Settings
$config['powerdns']['conf']['launch']['value']='';
$config['powerdns']['conf']['launch']['description']='';
$config['powerdns']['conf']['gmysql-dnssec']['value']='';
$config['powerdns']['conf']['gmysql-dnssec']['description']='';
$config['powerdns']['conf']['gmysql-host']['value']='';
$config['powerdns']['conf']['gmysql-host']['description']='';
$config['powerdns']['conf']['gmysql-dbname']['value']='';
$config['powerdns']['conf']['gmysql-dbname']['description']='';
$config['powerdns']['conf']['gmysql-user']['value']='';
$config['powerdns']['conf']['gmysql-user']['description']='';
$config['powerdns']['conf']['gmysql-password']['value']='';
$config['powerdns']['conf']['gmysql-password']['description']='';
?>
