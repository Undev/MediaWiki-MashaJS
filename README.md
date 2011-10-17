# MashaJS

This MediaWiki extension allows to use features
of [MaSha.JS](http://mashajs.com/) (Mark &amp; Share) library.

## Requirements

* MediaWiki 1.17 or above.

## Installation

Clone extension repository to <tt>extensions/MashaJS</tt> directory and update submodules.

```bash
cd $MEDIAWIKI_ROOT
git clone git://github.com/Undev/MediaWiki-MashaJS.git extensions/MashaJS
cd extensions/MashaJS
git submodule update --init
cd ../..
```

Add to <tt>LocalSettings.php</tt> before trailing <tt>?&gt;</tt> this code:

```perl
require_once( "$IP/extensions/MashaJS/MashaJS.php" );
```

That's all.

## License

Licensed under MIT License.

## Links

* [Home page](http://www.mediawiki.org/wiki/Extension:MashaJS)
* [GitHub Repository](https://github.com/Undev/MediaWiki-MashaJS)

