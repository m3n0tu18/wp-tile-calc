# Wordpress Plugin Vue Integration.

## Overview
This project is a boilerplate for your integrations. Make sure you rename the plugin folder and the my-vue-plugin.php to something more suitable. Also change the default plugin information to get this working.

## Prerequisits
This project uses vue.js 3 and webpack to run and build. Make sure you have node and npm installed on your machine to progress further. Also you need to have some node and vue knowledge to properly build with.

## Locations:
/src/App.vue: This is your main app template location, there might be offshoots like a component etc but this is the area to make the most amendments.
/my-vue-plugin.php: this is where the shortcode sits. Rename the shortcode to fit your plugin standards.

## Troubleshooting:

- Q: localhost:9000 isn't changing the content on the fly after you make changes to your App.vue file?
- A: This is because you need to make sure your wordpress its in WP_DEBUG=true when you ``npm run build``. The way the caching works with the localhost:9000 is that it stores the bundle.js in memory (renamed accordingly to webpack standards) so for it to successfully "HOT" reload, you need to make sure that the wp-config.php file has WP_DEBUG set to true. TO NOTE: Remember to turn off debug when you are ``npm run build`` to properly test on the domain environment. 

