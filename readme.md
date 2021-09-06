<h1>James Wright</h1>

<h1>Global 4 Communications Technical Task</h1>

<h2>Comments / Assumptions</h2>

<ul>
    <li>PHP version could be less than PHP 7.2.5, to be safe i built the project using Laravel 5.8 which will work on PHP >= 7.1.3, I didnt want to goto Laravel 8 if PHP 7.2 or above was not used within the docker containers on the production server. Also raising the version too much will have an impact on some of the functions witten in PHP 7.2 as PHP 7.4 made a lot of functions depreciated.</li>
    <li>Sales targets are based on QTY and value (10 QTY, 500 Value). The total from user sales is calculated at one month + installation cost (so that it makes sense when placing orders). All costs are fictitious and randomly generated at the point of migration to give some demo data.</li>
    <li>I have also added user login's to test "As a Telesales Agent I want to see a list of orders that I have created", login details are below in this document.</li>
    <li>Also added broadband speed to the order process to allow for prices to be displayed, given in the specification a "Global 4 sells a variety of broadband services", I thought this would be more in-keeping with an actual system</li>
    <li>Contact information has been kept short to give the idea of adding a customer but a lot more could be added in data wise</li>
    <li>Payment Information recommendations based on my personal exposure to PCI-DSS
        <ul>
            <li>Credit Card Information
                <ul>
                    <li>Hashed and encrypted at a minimum ideally stored and processed by an external entity e.g. stripe or sage.</li>
                    <li>If the card details are stored then ideally they should be saved in another database with a UUID/GUID identifier saved against the record for the customer. The other database access should be restricted to limited personnel and applications inline with PCI-DSS compliance.</li>
                </ul>
            </li>
            <li>Bank Account Details
                <ul>
                    <li>Hashed and encrypted the same as the credit card information.</li>
                    <li>Account numbers and sort codes are not as sensitive as PAN number from a credit/debit card but following the same processes as card details equates to safer user data overall.</li>
                </ul>
            </li>
            <li>Third Party Libraries
                <ul>
                    <li>Ideally if using a third party provider this would include a client side JS library which just returns a token for storage within the database that way the card details are never processed by the system allowing to comply with a lesser PCI-DSS accreditation</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<h2>Installation Instructions - Docker Deployment</h2>

<h3>Prerequisite</h3>
<ul>
    <li>Composer, NPM and docker are all installed</li>
</ul>

In a Terminal at project root level run the following command(s)
<ul>
    <li>cp .env.example .env</li>
    <li>composer install</li>
    <li>npm install</li>
    <li>docker-compose up -d</li>
    <li><span style="font-weight: bold">docker ps</span> this should list three containers in a running state</li>
    <li>docker-compose exec db bash</li>
    <li>mysql -u root -p</li>
    <li>type the password of 'global4' excluding brackets</li>
    <li>GRANT ALL ON global4.* TO 'global4'@'%' IDENTIFIED BY 'global4';</li>
    <li>FLUSH PRIVILEGES;</li>
    <li>exit</li>
    <li>exit</li>
    <li>docker-compose exec app bash</li>
    <li>php artisan migrate</li>
    <li>Open you favourite web browser and goto http://127.0.0.1 and login with the credentials below</li>
</ul>

<h2>User Details</h2>
<ul>
    <li>user1@example.com - password</li>
    <li>user2@example.com - password</li>
</ul>

