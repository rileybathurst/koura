# Koura for Katerina

Koura is a Maori translation for gold

Theres something about the max-width: var(--albatross) breaking the footer

I'm removing foundation and gulp
Going back to a local sass build

```bash
sass --watch scss/app.scss css/app.css
```

```bash
sass --style=compressed scss/app.scss css/app.css
```

The way I'm developing will be with a pattern lab for hot module reload

## Images

The images are locked to a size so if they are a 2:3 vertical image ratio when uploaded they will stretch this can be fixed on some browsers with aspect ratio css or JS as a fallback 66% adoption as of April 2021 without Safari as the main problem.

## To Do

- documentate all the things
- add designs to zepplin if i have the most recent
- add to dos to git hub and fix
- offline development, is this due to missing plugins?
- bring in prettier for editing
- remove foundation and gulp
- theres woocommerce themes that are behind and need fixing
- css I need to document things like which styles are overwritting a wordpress style
- rename branch to main
- remove flaxen naming
- look at some of the work done in new themes to easily update
- get rid of global styles
- /scss/off-canvas.scss is a foundation pull through this can be dealt with in a lot better ways

## Template Overrides

Adjust the single product

Single product view is currently coming from woocommerce
/templates/content-single-product.php

What I need is inside of
do_action( 'woocommerce_single_product_summary' );

this is inside of
_this I will need to override_
includes/wc-template-hooks.php

the functions its running are inside of
_this I will need to override_
includes/wc-template-functions.php

which I cant override as its not a template its a set of hooks,
those I can override
