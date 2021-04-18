## Welcome to the red cross administrator
**Install:**

Run the following commands in the following order.

*cp .env.example .env*

*composer install*

*php artisan migrate*

*php artisan db:seed*

### Create a script called global.js to add the url pointing from the backend 

public/js/global.js

Inside global write the script:

*var linkData = 'http://domainproject.net/';*
