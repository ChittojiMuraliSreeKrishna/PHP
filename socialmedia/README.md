# to use this first we have to create a database called socialmedia using phpmyadmin
# this has three tables 
## users
>for login signup and profile 
## messages
>for personal messages
## globalmessages
>for global messages

```php
// this is the connection
$db = mysqli_connect('localhost', 'root', '', 'socialmedia')
```
