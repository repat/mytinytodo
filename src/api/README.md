mytinytodo API
======
I'm writing a simple RESTful JSON-API for lists and items for myTinyTodo. It's very very alpha and not secure at all. Don't use it yet. Contributions welcome!

### I'm working on this right now ###
* Application Token/Signature(as in hash(user+apptoken))
* getTitles format

### For Debugging only
#### GET /api/getMD5pw
If there is a password set in `db/config.php.default`, it will be displayed as a [MD5-Hash](https://en.wikipedia.org/wiki/MD5 "MD5 on wikipedia").

Example(MD5 for 'password'):
`{"md5pw":"5f4dcc3b5aa765d61d8327deb882cf99"}`

#### GET /api/getSHA1pw
If there is a password set in `db/config.php.default`, it will be displayed as a [SHA-1-Hash](https://en.wikipedia.org/wiki/SHA-1 "SHA-1 on wikipedia").

Example(SHA-1 for 'password'):
`{"sha1pw":"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8"}`

### Get

#### GET /api/getTitles
Returns all entries of specified list(`$listname`) and numbers them with an index. **I'm gonna rewrite this with a nested JSON-array.**

Parameters:
* listname
* optional: md5pw (see above)
* optional: sha1pw (see above)

Example:
`{"title0":"testentry"}`

#### GET /api/getLists
Returns the lists with an index. The key is the `list` + an index number which is the counting up from 0. The value is another json object with the `id` from the database-table and the name. The `id` is going to be needed for updating the table later on.

Parameters:
* optional: md5pw (see above)
* optional: sha1pw (see above)

Example:
`{"list0":{"id":"1","name":"Private"},"list1":{"id":"2","name":"Work"},"list2":{"id":"3","name":"University"}}`

#### GET /api/getNumberOfLists
Returns the number of ToDo-Lists

Parameters:
* optional: md5pw (see above)
* optional: sha1pw (see above)

Example:
`{"numberOfLists":"3"}`

### Set

#### POST /api/updateEntry
#### POST /api/newEntry
#### POST /api/newList

### Remove

#### POST /api/removeEntry
#### POST /api/removeList

### Known issues
* Problems with [German Umlauts](https://en.wikipedia.org/wiki/Germanic_umlaut "German Umlauts on Wikipedia")

-

### Contact
* http://repat.de
* email: repat[at]repat[dot]de
* XMPP: repat@jabber.ccc.de
* Twitter: [repat123](https://twitter.com/repat123 "repat123 on twitter")
* Languages: German, English, French

### Copyright
* as the original: [GNU GPL v3](http://opensource.org/licenses/GPL-3.0 "GPL 3.0 on opensource.org")
