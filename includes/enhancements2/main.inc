<div class="rounded-box bg-base-200 my-5 p-5 md:p-8 lg:p-10 max-w-none prose prose-sm">
    <h1>Enhancements - PHP</h1>
    <h2>ORM - Object Relational Mapping</h2>
    <p>
        Implemented a basic ORM - Object Relational Mapping model to query database without re-writing queries.
    </p>
    <p>
        The core <code>models/model.php</code> is a class, which implements frequently used queries such as find by ID, specific fields, etc.
    </p>
    <p>
        This class also parse an array, which contains fields to be queried, into an SQL query.
    </p>
    <h3>Example - Insert Query</h3>
    <p>
        <code> [
            "name" => "Veggie Sensation Personal Pan",
            "description" => "Mushrooms, pineapple, diced tomato, green capsicum, Kalamata olives, cheddar, onion & oregano, finished with aioli drizzle",
            "image_card" => "/images/veggie-sensation-personal-pan-3709/card.webp",
            "image_detail" => "/images/veggie-sensation-personal-pan-3709/detail.webp",
            "slug" => "veggie-sensation-personal-pan-3709",
            "taxonomy" => "pizza.personalpan",
            "price" => 7.95
            ]</code>
    </p>
    <p>will be parsed into</p>
    <p>
        <code>
            INSERT INTO products ( name, description, image_card, image_detail, slug, taxonomy, price )
            VALUES ( 'Veggie Sensation Personal Pan', 'Mushrooms, pineapple, diced tomato, green capsicum, Kalamata olives, cheddar, onion & oregano, finished with aioli drizzle', '/images/veggie-sensation-personal-pan-3709/card.webp', '/images/veggie-sensation-personal-pan-3709/detail.webp', 'veggie-sensation-personal-pan-3709', 'pizza.personalpan', 7.95 )
        </code>
    </p>

    <h2>
        Management Dashboard
    </h2>
    <p>
        Implemented a Management Dashboard with user creation and user login. Used SB Admin Bootstrap Template from <a href="https://github.com/StartBootstrap/startbootstrap-sb-admin-2">StartBootstrap</a>.
    </p>
    <p>
        <a href="manager.php">Click here to view Dashboard</a>
    </p>
    <p>
        Used PHP's built-in password hashing function to store/validate logins:
    </p>
    <p>
        <code>
            $hashed_password = password_hash($password, PASSWORD_DEFAULT );
        </code>
    </p>
    <p>
        Due to Mercury using PHP5, an external library (by Anthony Ferrara), is used to allow compatibility (<code>password.php</code>)
    </p>
    <h2>Shopping cart</h2>
    <p>
        Visitors can now buy multiple items at once, by implementing a shopping cart. This is done by creating a <code>carts</code> and a <code>cart_items</code> table, where the <code>cart_items</code> table can be queried to find all rows with matching <code>cart_id</code> field, thus returning all items that belongs in the cart.
    </p>
    <p>
        Each product items can have varying options that adds on to the price. This is also automatically calculated in <code>/models/cart.php</code>.
    </p>
    <h2>Session</h2>
    <p>Visitor is assigned a session cookie after their first visit. This session token is used to acquire cart data.</p>
    <p>A random token is generated with a GUIDV4 (Globally Unique Identifier) function:</p>
    <p><code>
        function GUIDV4(){...}
    </code></p>
    <p>which returns e.g.<code>a81e9377-bb4c-4dba-b2e5-1163d3b38dd0</code></p>
    <p>Session is also used to implement login in the Management Dashboard.</p>
    <h2>Storing products data in the Database</h2>
    <p>All product data is stored inside the <code>products</code> table. All product content on the site is rendered from database queries.</p>
</div>