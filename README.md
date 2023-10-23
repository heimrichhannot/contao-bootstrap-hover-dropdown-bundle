# Contao Bootstrap Hover Dropdown Bundle

![](https://img.shields.io/packagist/v/heimrichhannot/contao-bootstrap-hover-dropdown-bundle.svg)
![](https://img.shields.io/packagist/dt/heimrichhannot/contao-bootstrap-hover-dropdown-bundle.svg)

This bundle offers hover functionality for the contao navigation using a bootstrap dropdown menu.

## Feature 

* hover support for bootstrap dropdown menu
* [Encore Bundle](https://github.com/heimrichhannot/contao-encore-bundle) support

## Installation

1. Install via composer: 

    ```
    composer require heimrichhannot/contao-bootstrap-hover-dropdown-bundle
    ```

1. Update your database.
1. If you're using encore bundle, run prepare and build command.


## Usage

Select the `nav_hover_dropdown.html5` (legacy: `nav_navbar_collapse_hover.html5`) template inside your navigation module or copy the template and adjust for your needs.

If you're using encore bundle, activate the `contao-bootstrap-hover-dropdown-bundle` entry in your layout or page settings.

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