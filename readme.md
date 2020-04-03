## Mobile HOSTS

HOSTS files converted or sourced from various mobile filter lists to prevent ads and tracking.

Currently includes:
- [Adguard Mobile Ads](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardMobileAds.txt) (from [Adguard](https://github.com/AdguardTeam/AdguardFilters/blob/master/MobileFilter/sections/adservers.txt))
- [Adguard Mobile Tracking and Spyware](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardMobileSpyware.txt) (from [Adguard](https://github.com/AdguardTeam/AdguardFilters/blob/master/SpywareFilter/sections/mobile.txt))
- [Adguard Specific Apps](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardApps.txt) (from [Adguard](https://github.com/AdguardTeam/AdguardFilters/blob/master/MobileFilter/sections/specific_app.txt))
- [EasyPrivacy 3rd-Party](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/EasyPrivacy3rdParty.txt) (from [EasyList](https://github.com/easylist/easylist/blob/master/easyprivacy/easyprivacy_thirdparty.txt))
- [EasyPrivacy Specific](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/EasyPrivacySpecific.txt) (from [EasyList](https://github.com/easylist/easylist/blob/master/easyprivacy/easyprivacy_specific.txt))
- [Adguard DNS](https://raw.githubusercontent.com/r-a-y/mobile-hosts/master/AdguardDNS.txt) (from [Adguard](https://adguardteam.github.io/AdGuardSDNSFilter/Filters/filter.txt)) (Includes simplified version of Adguard English filter, Social media filter, Spyware filter, Mobile ads filter, plus EasyList and EasyPrivacy) (Recommended for desktops only)

These lists will be updated from time-to-time.  To update them yourself, the repo includes a PHP-CLI script (`converter.php`) that converts ad filter lists into HOSTS files.  View the source for more details.  Send a pull request if you want me to add a specific filter list.

FWIW, I personally just use Adguard Mobile Ads and Adguard Mobile Tracking and Spyware on my mobile devices.

#### Other good HOSTS files
- [Eulaurarien First-Party Trackers](https://hostfiles.frogeye.fr/firstparty-trackers-hosts.txt) ([Source](https://git.frogeye.fr/geoffrey/eulaurarien/))

#### How to use?

Copy one of the above URLs into any HOSTS app that allows adding URLs as a source.

Originally created for use with Android.  For unrooted devices, use DNS66.  For rooted devices, try AdAway.

#### Sources
- Adguard filters are licensed under the GPLv3 [(1)](https://github.com/AdguardTeam/AdguardFilters/blob/master/LICENSE) [(2)](https://github.com/AdguardTeam/AdGuardSDNSFilter/blob/master/LICENSE)
- EasyPrivacy is dual-licensed under the GPLv3 and Creative Commons Attribution-ShareAlike 3.0 Unported license [(1)](https://easylist.to/pages/licence.html)

#### License

GPLv3