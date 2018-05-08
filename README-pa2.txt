URL: http://centaurus-6.ics.uci.edu:9442/pa2/index.html

Name of student: Tyler Vu
student id: 82249442

There are 3 main pages
- home page (index.html)
- product page (html/productList.php)
- team page (html/team.html)

The home page and team page are for aesthetics and offer little to no functionality. There is a fixed navigation bar at the top of every page in order to allow ease of navigation.

The main functionality lies within the productList page. Once on the product page, scrolling down will show all of the available rocks for sale. Clicking on the image of a rock will take you to the details of that product as well as the order form.

Requirement fulfillment locations:

1. This can be found by clicking on one of the rock images on the productList page. This will take you to the description page of that rock (rockDetails.php). Clicking on a page will query the php file with a rockNum (i.e rockDetails.php?rockNum=1) and dynamically return the information from the database.

2. After filling in the required information in the order form on the rockDetails.php page, it will send the information to the database. This information is sent to the database using the "postToDb.php" script. There is a javascript function called pushToDb() in "js/scripts.js" that calls the php script if the form is valid.

3. Filling in the required information and then pressing the button at the bottom "Place Order" will send the information to the database and dynamically update the page using AJAX with some order details.

4. 

- The first implementation of AJAX is found by entering a valid ZIP code in either the billing or shipping sections of the form. That will send a request to the server to resolve the ZIP code into a state. The state input will then automatically update to the correct state to match the zip code.

- The second implementation of AJAX is found by entering a valid rock number and quantity for the order. Onblur of either of those input boxes will dynamically generate the price at the bottom of the page. An AJAX request is sent to the db to grab the price of the rock.
