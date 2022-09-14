# Contao Bootstrap Hover Dropdown Bundle

![](https://img.shields.io/packagist/v/heimrichhannot/contao-bootstrap-hover-dropdown-bundle.svg)
![](https://img.shields.io/packagist/dt/heimrichhannot/contao-bootstrap-hover-dropdown-bundle.svg)

This bundle offers hover functionality for the contao navigation using a bootstrap dropdown menu.

## Installation

Prerequisites:
* Bootstrap ^4.0
* Contao ^4.4

Install via composer: `composer require heimrichhannot/contao-bootstrap-hover-dropdown-bundle` and update your database.

### Installation with frontend assets using webpack

This bundle is prepared to be used with webpack. Please see the [introductions](https://github.com/heimrichhannot/contao-encore-bundle/blob/master/docs/introductions/bundles_with_webpack.md). If you want to configure your Modernizr setup using Webpack, also check out the Modernizr section there.

#### Modernizr config

If you configure your Modernizr setup with webpack, you can disable `$GLOBALS['TL_JAVASCRIPT']['modernizr']`. Following configuration is needed:

```javascript
{
    "options": [
        "mq"
    ],
    "feature-detects": [
        "test/touchevents"
    ]
}
```

## Usage

Select the `nav_hover_dropdown.html5` (legacy: `nav_navbar_collapse_hover.html5`) template inside your navigation module or copy the template and adjust for your needs.
