# Robots Noindex Nofollow

Say no to search engine crawlers.

This tiny module prevents your site from being indexed by the search engines.
It's recommended to use it with the [Configuration Split](https://www.drupal.org/project/config_split)
module on your Development, Testing, Staging Drupal installations ONLY.

DO NOT INSTALL THIS MODULE ON YOUR PRODUCTION INSTANCES UNLESS IT'S ON PURPOSE.

Technically, it inserts the following line to every page.

```
<meta name="robots" content="noindex, nofollow" />
```

### Sponsorship

This module is sponsored by [InterGreat.com](http://www.intergreat.com).
