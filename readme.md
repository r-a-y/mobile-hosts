# Mobile HOSTS

HOSTS files converted or sourced from various mobile filter lists to prevent ads and tracking.

Currently includes:

- [AdGuard Mobile Ads](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardMobileAds.txt) (from [AdGuard](https://github.com/AdguardTeam/FiltersRegistry/blob/master/filters/filter_11_Mobile/filter.txt))
- [AdGuard Mobile Tracking and Spyware](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardMobileSpyware.txt) (from [AdGuard](https://github.com/AdguardTeam/AdguardFilters/blob/master/SpywareFilter/sections/mobile.txt))
- [AdGuard Tracking Protection](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardTracking.txt) (from [AdGuard](https://github.com/AdguardTeam/FiltersRegistry/blob/master/filters/filter_3_Spyware/filter.txt))
- [AdGuard CNAME-cloaked Trackers](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardCNAME.txt) (from [AdGuard](https://github.com/AdguardTeam/cname-trackers/blob/master/combined_disguised_trackers.txt))
- [EasyPrivacy 3rd-Party](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/EasyPrivacy3rdParty.txt) (from [EasyList](https://github.com/easylist/easylist/blob/master/easyprivacy/easyprivacy_thirdparty.txt))
- [EasyPrivacy Specific](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/EasyPrivacySpecific.txt) (from [EasyList](https://github.com/easylist/easylist/blob/master/easyprivacy/easyprivacy_specific.txt))
- [EasyPrivacy CNAME-cloaked Trackers](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/EasyPrivacyCNAME.txt) (from [EasyList](https://github.com/easylist/easylist/blob/master/easyprivacy/easyprivacy_specific_cname.txt))
- [AdGuard DNS](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardDNS.txt) (from [AdGuard](https://adguardteam.github.io/AdGuardSDNSFilter/Filters/filter.txt))

    AdGuard DNS is a simplified filter list made for DNS-level blocking. It [includes various lists](https://github.com/AdguardTeam/AdGuardSDNSFilter/blob/master/configuration.json) from AdGuard (Base, Mobile Ads, Tracking Protection, Cryptomining, Chinese, French, German, Japanese, Russian, Spanish/Portuguese, Turkish), EasyList (Base, Chinese, German, Italian), EasyPrivacy, Adblock Plus (Indonesian) and hostsVN (Vietnamese). Due to the size of the list, it is recommended for desktops only or in cases where you don't trust your users.

These lists will be updated from time-to-time. To update them yourself, the repo includes a PHP-CLI script (`converter.php`) that converts ad filter lists into HOSTS files. View the source for more details. Send a pull request if you want me to add a specific filter list.

FWIW, I personally just use AdGuard Mobile Ads and AdGuard Mobile Tracking and Spyware on my mobile devices.

## Other good HOSTS files

- [Eulaurarien First-Party Trackers](https://hostfiles.frogeye.fr/firstparty-trackers-hosts.txt) ([Source](https://git.frogeye.fr/geoffrey/eulaurarien/))

## How to use?

Copy one of the above URLs into any HOSTS app that allows adding URLs as a source.

Originally created for use with Android. For unrooted devices, use personalDNSfilter. For rooted devices, try AdAway. All are available on F-Droid.

It is worth noting that DNSfilter can handle wildcard entries, which will offer better subdomain blocking coverage, but uses Android's built-in VPN to handle the blocking.

## Alternatives for Android

Instead of using a HOSTS file, if you are on Android Pie or above, you can use the Private DNS (DNS over TLS) feature from a reputable provider like AdGuard, NextDNS or Quad9 for blocking. NextDNS allows you to choose various filter lists when you create an account with them, whereas AdGuard DNS covers the lists mentioned above and Quad9 specifically offers protection from malware and phishing.

## Sources

- AdGuard filters are licensed under the GPLv3 [(1)](https://github.com/AdguardTeam/AdguardFilters/blob/master/LICENSE) [(2)](https://github.com/AdguardTeam/AdGuardSDNSFilter/blob/master/LICENSE)
- EasyPrivacy is dual-licensed under the GPLv3 and Creative Commons Attribution-ShareAlike 3.0 Unported license [(1)](https://easylist.to/pages/licence.html)

## License

GPLv3
